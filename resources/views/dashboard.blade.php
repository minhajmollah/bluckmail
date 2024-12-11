<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
              <h3>Contact Form</h3>

<div class="container">
  <form action="{{url('/sendbluck')}}" method="post" enctype="multipart/form-data">
  @csrf
    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Your Subject..">



    <label for="via">Send via</label>
    <select id="via" name="via">
      <option value="to">To</option>
      <option value="cc">CC</option>
      <option value="bcc">Bcc</option>
    </select>

    <label for="subject">message</label>
    <textarea id="file" class="tinymce-editor" name="message" rows="4" cols="50" placeholder="Write something.." style="height:200px"></textarea>
      <label for="csv-file">import csv</label>
    <input type="file" id="file" name="file" style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
         
                </div>
            </div>
        </div>
    </div>
     
</x-app-layout>
