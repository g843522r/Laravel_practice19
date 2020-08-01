<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
  //「PHP/Laravel 19」課題1より作成
  public function index(Request $request) {
    
    // Profileモデルのインスタンスは「$profiles」とした(新しい順の配列)
    $profiles = Profile::all()->sortByDesc('updated_at');
    
    // 「$headline」は作成しない(プロフィール一覧においては不要と考えた)

    // profile/index.blade.php ファイルを渡し、
    // Viewのprofilesのbladeテンプレートに$profilesを渡す記述
    return view('profiles.index', ['profiles' => $profiles]);
  }
  
}
