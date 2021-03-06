@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>

  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

  /* Button used to open the contact form - fixed at the bottom of the page */
  .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
  }

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
  </style>

<form class="container" action="/addbadminton/{{$Badminton->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <label ><b>แก้ไขตารางแข่งขันแบดมินตัน</b></label>
          </div>
    </div>
    <table style="width:60%" class="container"> 
      <tr>
        <th><div class="col-auto my-1">วันที่ :: <input type="date" name="date" value="{{$Badminton->date}}"></div></div></th>
        <th><div class="col-auto my-1">เวลา :: <input type="time" name="time" value="{{$Badminton->time}}"></div></th>
        <th><div class="col-auto my-1">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
          <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
            <option selected>{{$Badminton->category}}</option>
            <option value="ชาย">ชาย</option>
            <option value="หญิง">หญิง</option>
          </select>
        </div></th>
        <th>
          <div class="col-auto my-1">
            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
            <select class="custom-select mr-sm-2" name="line" id="inlineFormCustomSelect">
              <option selected>{{$Badminton->line}}</option>
              <option value="A">A</option>
              <option value="B">B</option>
            </select>
        </th>
        <th>
          <div class="col-auto my-1">
            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
            <select class="custom-select mr-sm-2" name="around" id="inlineFormCustomSelect">
              <option selected>{{$Badminton->around}}</option>
              <option value="รอบแรก">รอบแรก</option>
              <option value="รอบสอง">รอบสอง</option>
              <option value="รอบรองชนะเริศ">รอบรองชนะเริศ</option>
              <option value="รอบชิงชนะเริศ">รอบชิงชนะเริศ</option>
            </select>
          </div>
        </th>
      </tr>
    </table>
    <table style="width:50%" class="container">
      <tr>
        <th><div class="col-auto my-1">
          <label class="mr-sm-2 sr-only"  for="inlineFormCustomSelect">Preference</label>
          <select class="custom-select mr-sm-2" name="team" id="inlineFormCustomSelect">
            <option selected>{{$Badminton->team}}</option>
            <option value="">Phy</option>
            <option value="Chem">Chem</option>
            <option value="Bio">Bio</option>
            <option value="Rpt">Rpt</option>
            <option value="Math">Math</option>
            <option value="Com">Com</option>
            <option value="It">It</option>
            <option value="Occ">Occ</option>
            <option value="Mico">Mico</option>
            <option value="Envi">Envi</option>
          </select>
        </div></th>
        <th><span class="ec-fixture-vs"><small>vs</small></span></th>
        <th>
          <div class="col-auto my-1">
            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
            <select class="custom-select mr-sm-2" name="pair" id="inlineFormCustomSelect">
              <option selected >{{$Badminton->pair}}</option>
              <option value="">Phy</option>
              <option value="Chem">Chem</option>
              <option value="Bio">Bio</option>
              <option value="Rpt">Rpt</option>
              <option value="Math">Math</option>
              <option value="Com">Com</option>
              <option value="It">It</option>
              <option value="Occ">Occ</option>
              <option value="Mico">Mico</option>
              <option value="Envi">Envi</option>
            </select>
          </div>
        </th>
      </tr>
    </table>
    <br>
    <table style="width:50%" class="container">
      <tr>
        <th><div class="col">

            <label>{{$Badminton->team}}</label>
            <input type="text" value="{{$Badminton->rbadmintons1}}" name="rbadmintons1" class="form-control">
         </div></th>
         <th><label><b><h4>ผล</h4></b></label></span></th>
         <th>
            <div class="col">
                <label>{{$Badminton->pair}}</label>
                <input type="text" value="{{$Badminton->rbadmintons2}}" name="rbadmintons2" class="form-control" >
              </div>
         </th>
         <th><br><br><br>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">ตกลง</button>
              </div>
         </th>
      </tr>
    </table>
      
   
  </form>



@endsection
