<?php

namespace App\Http\Livewire\Modals\UserForm;

use Livewire\Component;

class LanguageController extends Component
{
    public $lang = 'Nyelv';
    public $lvl = 'Szint';

    public $languages;

    protected $rules = [
        'lang' => ['required','not_in:Nyelv'],
        'lvl' => ['required','not_in:Szint'],
    ];

    public function mount($languages)
    {
        $this->languages = collect($languages);
    }

    public function addLanguage(){
        $this->validate();

        $this->languages->put($this->lang, $this->lvl);

        $this->emitUp('languageUpdated', $this->languages);
        $this->reset('lang', 'lvl');
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
