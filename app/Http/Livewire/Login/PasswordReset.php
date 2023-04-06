<?php

namespace App\Http\Livewire\Login;

use App\Models\UserProperty;
use App\Models\User;
use App\Models\PasswordReset as PasswordResetModel;
use App\Filters\Active;
use App\Filters\hasProperty;
use App\Http\Traits\WithNotification;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;

class PasswordReset extends ModalComponent
{
    
    use WithNotification;

    public $name;
    public $dateOfBirth;
    public $entryCard;


    protected $rules =[
        'name' => ['required'],
        'dateOfBirth' => ['required'],
        'entryCard' => ['required'],
    ];

    protected $messages =[
        'name.required' => "Név mező kitöltése kötelező!",
        'dateOfBirth.required' => 'A születési idő mező kitöltése kötelező!',
        'entryCard.required' => 'A belépő kártya számát kötelező megadni!'
    ];

    public function send()
    {

        $this->validate();

        $isExist = (new Pipeline(app()))
                ->send(UserProperty::query())
                ->through([
                    (new hasProperty('date_of_birth', $this->dateOfBirth)),
                    (new hasProperty('entry_card', $this->entryCard)),])
                ->thenReturn()
                ->first();

        if( $isExist) {
            
            $isExist = (new Pipeline(app()))
                    ->send(User::query())
                    ->through([
                        (new hasProperty('id', $isExist->user_id)),
                        (new hasProperty('name', $this->name))])
                    ->thenReturn()
                    ->first();

            if ( $isExist ) { 

                $this->store(collect(Array('user_id' => $isExist->id)));

                $this->closeModal();

                return $this->sendSuccessResponse('A kérést továbítottuk az adminok irányába!'); 
            }
    
        } 
        
        return $this->sendFaildResponse('A megadott adatok nem felelnek meg a valóságnak, vegye fel a kapcsolatot a rendszergazdával!');
        
    }

    public function store(Collection $data): Void
    {

        if ($data->has('user_id')){

            $hasRequest = (new Pipeline(app()))
                    ->send(PasswordResetModel::query())
                    ->through([
                        Active::class,
                        (new hasProperty('user_id',$data['user_id']))])
                    ->thenReturn()
                    ->first();
           
            if ($hasRequest) { PasswordResetModel::find($hasRequest->id)->touch(); }
            else { PasswordResetModel::create(['user_id' => $data['user_id']]); }
        }

    }

    public function render()
    {
        return view('livewire.login.password-reset');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public static function closeModalOnClickAway(): bool
    {
            return false;
    }
}
