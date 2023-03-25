<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    public function index()
    {
        $firebase = (new Factory)
            ->withServiceAccount( __DIR__.'/test1-demo-7c990-firebase-adminsdk-y6vth-624aae33e6.json')
            ->withDatabaseUri('https://test1-demo-7c990-default-rtdb.firebaseio.com/');

        $database = $firebase->createDatabase();

        $blog = $database
        ->getReference('blog');

        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>';
    }
}
