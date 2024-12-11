<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Mail\blukmail;
use App\Mail\test;

class BluckMailJob 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
      protected $email;
      protected $content;
      protected $subject;
      protected $via;
     

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$content,$subject,$via)
    {
        $this->email=$email;
        $this->content=$content;
        $this->subject=$subject;
        $this->via=$via;
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

          
            $content=$this->content;
            $subject=$this->subject;

       
            $email=$this->email;
            $via=$this->via;
            if($via!=='to'&&$via!=='bcc'){
            
            $length=count($email);
            for ($i = 0; $i <$length; $i++) {
     
            Mail::Cc($email[$i])->send(new test($content,$subject));
            
        
            }
          }
          if($via!=='cc'&&$via!=='bcc'){
            $length=count($email);
            for ($i = 0; $i <$length; $i++) {
     
            Mail::to($email[$i])->send(new test($content,$subject));
            
            }
            }
            if($via!=='to'&&$via!=='cc'){
              $length=count($email);
              for ($i = 0; $i <$length; $i++) {
       
              Mail::Bcc($email[$i])->send(new test($content,$subject));
              
              }

            }

          }
          
       
   
        
    
    
    }


