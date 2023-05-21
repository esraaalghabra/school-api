<?php

namespace App\Http\Controllers;

class Summary{

    //TODO #1 ** Route & Controller & View **
    /*

        TODO 1_ ** Route **
        it is Link that do something as 'go to page, get or post some data, edit some information.... '
            call the Route by Tow methods:
            By URL: {{url('/example')}}
            By name: {{route('nameRoute')}}

            1) create Route with any type: get | post | put | patch | delete | options....
            2) pass parameters: {value1} must be param    {value2?} may be param or may be not
            4) separate Routes
                Should be separate Routes to multi file
                Each file must be declare method mapNameRoutes() in RouteServiceProvider and Call it in map() method
            5) Attribute of Routes { 'middleware' | 'group' | 'prefix' | 'namespace' }
            middleware: to specific accessible to Routes depend on specific conditions
            group: to group more Route with specifics Attribute
            prefix: to add prefix to sub URL for all Routes in a Group
            namespace: to specific the controllers that will control Routes in a Group

        TODO 2_ ** Controller And View **

            The Routes call methods of Controllers to do the something
            To pass data to view there are three methods:
                ^data separated  view('viewName')->with(['key'=> value,'key'=> value])
                ^data as Bundle  $data[]; data[key]=value;data[key]=value; view('viewName',$data)
                ^data as Object  $obj=new \stdclass(); $obj->key=value; $obj->key=value; view('viewName',compact('obj'))
            separate views
            @include('') ,@extends('') , @yield('') , @section('')
    */


    //TODO #2 ** Authentication **
    /*
        TODO 3_ Authentication
            TODO A_ Login and Register:

                * add components of authentication by composer:
                    composer require laravel/ui --dev  > composer require laravel/ui "1.2" ==> TODO create default component authentication
                    npm install && npm run dev  > php artisan ui vue --auth ==> TODO create default component authentication
                * customize "DB_DATABASE, DB_USERNAME and DB_PASSWORD" in file "env"
                * create database that have name is same name in file "env"
                * call migrations to create the tables that exist in it
                * create account mailTrap and add MAIL_USERNAME, MAIL_PASSWORD and MAIL_FROM_ADDRESS from account in file "env"
                * implements model from MustVerifyEmail
                * make auth Route: Auth::routes(['verify'=>true]);

            TODO B_ Login by Mobile

                * Editing design div from Email to Mobile
                * add column mobile to users table
                * add column mobile to fillable in User model
                * add override to username as: username() {return 'mobile';} in LoginController

            TODO C_ Login by Mobile or Email

                * Editing design div from Email to identify
                * add column mobile to users table
                * add column mobile to fillable in User model
                * add override to username as: username()
                    {
                        $value = request()->input('identify');
                        $field=filter_var($value,FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
                        request()->merge([$field => $value]);
                        return $field;
                    }} in LoginController


            TODO D_ Login by Facebook:

                *1 add package socialite by composer:
                    composer require laravel/socialite ==> TODO add package socialite Login by Facebook

                *2 add account in developers.facebook.com and create app
                *3 customize configurations of app
                    TODO
                        ^ select the platform and set the site url
                        ^ Go to Basic sitting to take App ID and secret to put in env
                        ^ set Terms as: http://localhost/8000/terms
                        ^ set privacy as: http://localhost/8000/anyPrivacy-policy
                        ^ set redirect url as: http://localhost/8000/callback/facebook
                *4 add socialiteServiceProviders:`laravel\socialite\SocialiteServiceProvider::class`
                            in config\app.php  with Application ServiceProviders
                *5 add import of socialite: `'Socialite'=> laravel\socialite\Facades\Socialite::class`
                            in config\app.php in Class Aliases
                *6 add FB_CLIENT_ID='' ,FB_CLIENT_SECRET='' and FB_REDIRECT='' to env
                *7 add in config\services.php 'facebook' => [
                                                            'client_id' => env('FB_CLIENT_ID'),
                                                            'client_secret' => env('FB_CLIENT_SECRET'),
                                                            'redirect' => env('FB_REDIRECT'),
                                                       ],
                *8  add Button to Design and put it url to Route that Register By facebook
                *9  create RouteRegisterByFacebook and pass service
                *10 create socialiteController and create the method:
                        redirect($service){ return Socialite::driver($service)->redirect();} to RedirectByFacebook
                        callback($service){ return Socialite::with($service)->user();} to CallbackFromFacebook with data
                *11 solve problem of SSL
                    TODO solve problem of SSL
                        ^ download cacert.pem file from: https://curl.haxx.se/ca/cacert.pem and put it in www Folder
                        ^ put ^ curl.cainfo="certificate C:\wamp64\cacert.pem" ^ in php.ini, php.configuration and phpForApache
    */


    //TODO #3 ** Task Scheduler & Models & Listener & Event **
    /*
        TODO 4_ Task Scheduler

            * Create task as Command by composer and edit signature, description, and handle() method
            * add path of Command to array of Commands in Kernel.php
            * call the Commands in schedule() by its signature and select period Scheduler

        *TODO 5_ Listener & Event
         * getVideo() call view and pass for it first video in db with viewerCounter
         * to link the video in db with event we pass modelTable in constructor of event and do initialize for it
         * to linking the event with it`s listener
         * pass object from event to handle(Event e) in listener then do require listener on event

        TODO 6_ Models

            * Model: it is simulate to table of database that has same name of table but start capital latter and is single word
            * must create model by composer and move to Models Folder
            *TODO Important Attributes
                    ^ $table: to set name to the table if it is not the tow conditions
                    ^ $fillable: to select the columns that we can set data to it
                    ^ $hidden: to select the columns that we can not retrieve data from it
                    ^ $timestamps: we set it 'false' to prevent put timestamps in Creation_at...
            *TODO CRUD operations
                    ^ Create: need:
                                    Route to call VFCreate() to view Form
                                    Action of Form call to other Route that call create()
                            1_ VFCreate(){ return view('create'); }
                            2_ create(Request $req){ ModelName::create(['column'=> $req -> name,'column'=> $req -> name,..]) }

            *TODO Check Valid of Form
                    ^ use: $validator=Validator::make($request->all(),rules,messages)
                            1_ Rules:  required | unique:tableName:columnName | numeric | max:x | min:x |  as Form 'column'=>'rules'
                            2_ Messages: required | unique:tableName:columnName | numeric | max:x | min:x |  as Form 'column'=>'rules'


             *find() look at column id byDefault but to search in other column must to pass for it 'nameColumn'=>'value'

            *TODO CRUD operations
                ^ Update: need:
                                Route to call VFUpdate() to view Form and retrieve data from dataBase by use select()->find()
                                Action of Form call to other Route that call update()
                            1_ VFUpdate($id){ return view('update',compact('data')); }
                            2_ update(Request $req,$id){
                            anyName= ModelName::find($id)
                            anyName->update($req->all()) }


    */


    //TODO #4  **  Relations  & Traits  **
    /*

    */


    //TODO #5 **  Pagination & Scopes & Accessors and Mutators & Collections  **
    /*

    */


    //TODO #6 **  APIs  **
    /*
        TODO  **  Introduction To APIs  **
        A- APIs use to communication between app and servers or between apps
        B- specify accessible apps to data in servers
        C- Each API must have userName and password to specify accessibility to routes by users
        D- all data return as JSON from servers to apps
        C- HTTP Methods { GET POST PUT DELETE }
        E- HTTP Status Code { 200: success   401: Unauthorized   403: forbidding
                              404: NotFound  500: Internal Error }

        TODO  **  Generate Token API by jwt  **
        click here https://github.com/tymondesigns/jwt-auth
        go to documentation of the package after click url or:
            A- Run this in terminal:
                `composer require tymon/jwt-auth`: to download package
                `php artisan vendor__products:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider" `: to publish the package
                `php artisan jwt:secret`: to Generate secret
            B- Each model related to authentication must extends Authenticatable and implements JWTSubject
               and do override to the methods: * getJWTIdentifier(){return $this->getKey();}
                                               * getJWTCustomClaims(){ return [];}
            C- Convert 'token' to 'jwt' in config\auth.php in guards `'api' => ['driver' => 'token','provider' => 'users']`
            D- Check from user is admin or not:
                1) Register guard 'admin-api' and 'user-api' in config\auth in guards
                2) Create middleware to check from validation of token
                3) add middleware in route and specify it as admin-api or user-api

        TODO  **  Login API by jwt  **

            1) Validation the request by this methods: returnCodeAccordingToInput($validator); returnValidationError($code,  $validator);
            2)




        TODO  **  Make middleware  **
        A- Run in terminal `php artisan make:middleware nameMiddleware`
           the middleware class has method `handle` that check validation of request
        B- Register middleware in Http\Kernel.php by put:
             'anyName' => Path\ClassMiddlewareName::class  in array 'routeMiddleware'
        C- Customize method `handle` depend on middleware work








        Notes:
            'JWT_TTL': key exist in config\jwt.php do auto logout after particular period

*/


    //TODO ##  **  Notes for Project   **
    /*+
        A- Create the project with auth and detection version of laravel
                note: the version important to detection version of packages that can be download it

        B- Separate the pages of project to parts:
            1) put css & js & sass files and assets in public
            2) put design files in views but must separate each grope of parts in folder
            3) put Heaters & Footers & NavBars & sideBars & any element maybe repeat in folder 'includes'
            4) collect the repeat elements as layouts to use in pages

        C- Build Authentication system:
            1) create tables of all guards that need and Models
            2) create guards and provider to each their in config\auth.php
            3) create pages of login, logout and register
            4) create routes that view each page and that do query
            5) create controllers that do all requirement of routes
            6) must be redirect all routes that need auth from any guard to page login if not Authenticated
            6) must be prevent visit page login if Authenticated it and redirect to other page

        D- CRUD Operation on Item:
            1) index: show all content this item from database
                * create route to call index()
                * that get all content by model and return it with view of index

            2) create: create new item to database
                * create route to call getCreate()
                * that show view of create that has form
                * create route to call create() that create item by model
                * redirect to index with success or error

            3) edit: edit item in database
                * create route to call getEdit($id)
                * that show view of edit that has form with data from database
                * create route to call edit() that edit item by model
                * redirect to index with success or error

            4) delete: delete item from database
                * create route to call delete($id) that delete item by model
                * redirect to index with success or error

    */




    //TODO # ** CommandLine **
    /*
        TODO ** CommandLine **
            TODO 1_ Run
            php artisan serve ==> TODO run the project
            php artisan serve --port 8001 ==> TODO run the project on another port
            php artisan optimize:clear ==> TODO clear cash of project
            composer dump-autoload ==> TODO run the project and update it
            php artisan route:list ==> TODO show list from Routes
            php artisan config:cache ==> TODO to editing on your code and feeling thereat

            TODO 2_ make
            php artisan make:controller ControllerName ==> TODO create controller and put in Controllers folder
            php artisan make:controller ControllerName --resource ==> TODO create controller and put in Controllers folder with resources
            php artisan make:command CommandName  ==> TODO create command and put in Console\Command folder
            php artisan make:model ModelName  ==> TODO create model and put in app folder
            php artisan make:event EventName  ==> TODO create event and put in app folder
            php artisan make:listener ListenerName  ==> TODO create listener and put in app folder
            php artisan make:seeder NameSeeder  ==> TODO create seeder and put in database folder in seeds folder
            php artisan migrate ==> TODO create the tables that exist in migrations
                note!! 'throws exception string is long solve by put Schema::defaultStringLength(191); in boot method in ServiceProvider  '



        */
}
