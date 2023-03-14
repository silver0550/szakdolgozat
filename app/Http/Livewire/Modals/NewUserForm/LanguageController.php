<?php

namespace App\Http\Livewire\Modals\NewUserForm;

use Livewire\Component;

class LanguageController extends Component
{
    public $language;
    public $level;

    public $languages = [];

    protected $rules = [
        'language' => ['required','not_in:Nyelv'],
        'level' => ['required','not_in:Szint'],
    ];


    public function addLanguage(){
        $this->validate();

        if ($this->languages){
    
            $this->languages = array_merge($this->languages, [$this->language => $this->level]);
        }
        else{
            $this->languages = [$this->language => $this->level];
        }
        $this->emitUp('languageUpdated', $this->languages);
        $this->reset('language', 'level');
    }

    public function removeLanguage($language){
        unset($this->languages[$language]);
    }

    public function render()
    {
        return view('livewire.modals.new-user-form.language-controller');
    }
}
