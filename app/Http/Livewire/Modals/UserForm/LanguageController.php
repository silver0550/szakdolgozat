<?php

namespace App\Http\Livewire\Modals\UserForm;

use Livewire\Component;

class LanguageController extends Component
{
    public $language;
    public $level;

    public $languages;

    protected $rules = [
        'language' => ['required','not_in:Nyelv'],
        'level' => ['required','not_in:Szint'],
    ];

    public function mount($languages)
    {   
        
        $this->languages = collect($languages);
       
    }

    public function addLanguage(){
        $this->validate();

        $this->languages->put($this->language, $this->level);

        $this->emitUp('languageUpdated', $this->languages);
        $this->reset('language', 'level');
    }

    public function removeLanguage($language){
        
        $this->languages->pull($language);
        $this->emitUp('languageUpdated', $this->languages);

    }

    public function render()
    {
        return view('livewire.modals.user-form.language-controller');
    }
}
