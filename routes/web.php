<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//use Illuminate\Http\File;


Route::get('/', function () {
    if (Auth::check())
        return redirect('home');
    else
        return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('/update_daily_messing', function () {
        return 'disabled page';
        return view('dailymessing');
    })->name('daily_messing.update');

    Route::put('update_daily_messing', 'dmController@updatedm')->name('daily_messing.update.put');

    Route::get('/add_extra_mess_item', function () {
        $res = \Illuminate\Support\Facades\DB::table('mess_items')->skip(0)->take(20)->get();
        return view('ExtraMessingItem', ['res' => $res]);
    })->name('mess_item.extra.add');

    Route::post('/ami', 'dmController@addmessitem')->name('mi.put');
    Route::post('/amid', 'dmController@mid')->name('mi.put.d');

    Route::get('/Bar_item_entry', function () {
        return view('BarItemEntry');
    })->name('bar_item.entry');


    Route::put('bie', 'dmController@bie')->name('bie.put');


    Route::get('/add_daily_messing', function () {
        return view('add_daily_messing');
    })->name('daily_messing.add');


    Route::post('add_daily_messing', 'dmController@adddm')->name('dm.add.put');

    Route::post('gdmprice', 'dmController@gdmprice')->name('gdmprice');

    Route::get('/add_extra_messing', function () {
        $res = \Illuminate\Support\Facades\DB::table('mess_items')->get()->sortBy('item_name');
        return view('add_extra_messing', ['res' => $res]);
    })->name('extra_messing.add');

    Route::put('add_extra_messing', 'dmController@emadd')->name('em.put');

    Route::get('/add_bar_bill', function () {
        $res = \Illuminate\Support\Facades\DB::select("select * from bar_items");
        return view('add_bar_bill', ['res' => $res]);
    })->name('bar.add');

    Route::put('abb', 'dmController@abb')->name('abb');

    Route::get('bill/{bd_no?}', function ($bd_no = null) {
        if ($bd_no == null) {
            $bd_no = \Illuminate\Support\Facades\DB::table('officer')->min('bd_no');;
        }

        $dmb = \Illuminate\Support\Facades\DB::table('daily_messing')->where('bd_no', '=', $bd_no)->get();
        $bb = \Illuminate\Support\Facades\DB::table('bar_messing')->where('bd_no', '=', $bd_no)->get();
        $emb = \Illuminate\Support\Facades\DB::table('extra_messing')->where('bd_no', '=', $bd_no)->get();
        $bds = \Illuminate\Support\Facades\DB::table('officer')->get('bd_no');
        $total = 0;
//        dump($bds);
        foreach ($dmb as $item) {
            $total += $item->price;
        }
        foreach ($bb as $item) {
            $total += $item->price;
        }
        foreach ($emb as $item) {
            $total += $item->price;
        }
        return view('bill', ['dmb' => $dmb, 'bb' => $bb, 'emb' => $emb, 'tot' => $total, 'bds' => $bds, 'se' => $bd_no]);
    })->name('get.bill');

    Route::get('/test', function () {
        $template = new \PhpOffice\PhpWord\TemplateProcessor('pdfs/template.docx');
        $template->setValue('company_name', 'BAF');
        //dump('/pdfs/template.docx');
        $template->saveAs('pdfs/result.docx');
        /*
         *
         * $template->cloneRow('arrayName', count($array));
and then you need to give all of them a values

for($number = 0; $number < count($array); $number++) {
    $template->setValue('arrayName#'.($number+1), htmlspecialchars($array[$number], ENT_COMPAT, 'UTF-8'));
}
         */
        return 'success';
    })->name('test');

    Route::get('/generatemr', function () {
        $users = DB::table('officer')->count();
        $arr = \Illuminate\Support\Facades\DB::select("select Bd_no from officer");
        return view("gmr", ["maxima" => $users, "list" => $arr]);
    })->name('gmr');

    Route::get('test1', function () {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'fahadhasan462@gmail.com';                     // SMTP username
            $mail->Password = 'fahad01990461149';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('fahadhasan462@gmail.com', 'Mailer');
            $mail->addAddress('201614013@student.mist.ac.bd', 'Shanto');     // Add a recipient
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

            // Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the Test Email <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    });


    Route::post("/mpms/{bd_no?}", function ($bd_no = null) {
        if ($bd_no == null) return "error";
        $template = new \PhpOffice\PhpWord\TemplateProcessor('pdfs/bill.docx');

        $dmb = \Illuminate\Support\Facades\DB::table('daily_messing')->where('bd_no', '=', $bd_no)->get();
        $bb = \Illuminate\Support\Facades\DB::table('bar_messing')->where('bd_no', '=', $bd_no)->get();
        $emb = \Illuminate\Support\Facades\DB::table('extra_messing')->where('bd_no', '=', $bd_no)->get();
        $bds = \Illuminate\Support\Facades\DB::table('officer')->where('bd_no', '=', $bd_no)->get('bd_no');
        $name = \Illuminate\Support\Facades\DB::table('officer')->where('bd_no', '=', $bd_no)->get('name');
        $rank = \Illuminate\Support\Facades\DB::table('officer')->where('bd_no', '=', $bd_no)->get('rank');
        $total = 0;
        //dump($rank);
        $m = 0;
        foreach ($dmb as $item) {
            $total += $item->price;
            $m += $item->price;
        }
        $bar = 0;
        foreach ($bb as $item) {
            $total += $item->price;
            $bar += $item->price;
        }
        $em = 0;
        foreach ($emb as $item) {
            $total += $item->price;
            $em += $item->price;
        }
        $datetime = date_create()->format('Y-m-d H:i:s');
        $month = date("m", strtotime($datetime));
        $year = date("Y", strtotime($datetime));
        $mo = '';
        switch ($month) {
            case 1    :
                $mo = "January";
                break;
            case 2 :
                $mo = "February";
                break;
            case 3  :
                $mo = "March";
                break;
            case 4  :
                $mo = "April";
                break;
            case 5  :
                $mo = "May";
                break;
            case 6  :
                $mo = "June";
                break;
            case 7  :
                $mo = "July";
                break;
            case 8  :
                $mo = "August";
                break;
            case 9  :
                $mo = "September";
                break;
            case 10  :
                $mo = "October";
                break;
            case 11  :
                $mo = "November";
                break;
            case 12    :
                $mo = "December";
                break;
        }
        $template->setValue('bd_no', $bd_no);
        $template->setValue('name', $rank[0]->rank . ' ' . $name[0]->name);
        $template->setValue('m', $m);
        $template->setValue('em', $em);
        $template->setValue('b', $bar);
        $template->setValue('base', 'Dhaka');
        $template->setValue('total', $total);
        $template->setValue('tot', $total);
        $template->setValue('date', $datetime);
        $template->setValue('month', $mo);
        $filename = 'pdfs/' . $year . '/' . $mo . '/';
        if (!file_exists($filename)) {
            File::makeDirectory($filename, 0777, true, true);
            echo "The directory was successfully created.";
        } else {
            echo "The directory exists.";
        }
        //dump('/pdfs/template.docx');
        $template->saveAs($filename . $bd_no . '.docx');
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'fahadhasan462@gmail.com';                     // SMTP username
            $mail->Password = 'fahad01990461149';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('fahadhasan462@gmail.com', 'Mailer');
            $mail->addAddress('201614013@student.mist.ac.bd', 'Shanto');     // Add a recipient
            $mail->addAttachment($filename . $bd_no . '.docx', $bd_no . '.docx');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Mess Bill';
            $mail->Body = 'This is the Test Email <b>in bold!</b>';
            $mail->AltBody = 'Mess Bill Report of previous month';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return "ok";
    })->name("mpms");

});
