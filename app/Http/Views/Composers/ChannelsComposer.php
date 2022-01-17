<?php

namespace App\Http\Views\Composers;

use Illuminate\View\View;
use App\Models\Channel;

class ChannelsComposer
{
  public function compose(View $view){

    $view->with('channels', Channel::orderBy('name')->get());
  }
}