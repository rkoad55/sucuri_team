@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app1')

@section('content')


<?php

$results=json_decode($ok);
//$messages = $result->messages;
 //print_r($result->output);  ?>
 @if(isset($message))
    <div class="alert alert-danger" role="alert">
        {{  $message }}
		<meta http-equiv = "refresh" content = "2; url = /admin/{{$request->id}}/dns" />

    </div>
    @endif
            {{-- For Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	<div class="row" style="background: white;">
                <div class="col-xs-12" style="width: 100%;">
                    <h2 style="font-size: 20px !important; padding: 10px;">Whitelist/Blacklist IP </h2>
                    <div class="panel panel-success">
                        <div class="panel-heading" style="padding: 10px;"><h3>{{$results->output->domain}}</h3></div>
                        <div class="panel-body" >
  					<h3>Add Ip BlackList / Whitelist</h3>
     
  					<form method="get"  role="form" action="/insertIp"  >      
              <input type="hidden" name="id" value="{{$id}}">
  						<span>Add Ip</span><br>
  						<input type="text" name="ip" required class="form-control" /><br>
  						<span>Select White-list Or Black-list</span><br>
  						<select name="list" required class="form-control">
  							<option value="">Select Ip List</option>
  							<option value="whitelist_ip">Whitelist Ip</option>
  							<option value="blacklist_ip">Blacklist Ip</option>
  						</select><br> 

  					<!-- 	<span>Enter Duration In Second (<sub>When you not enter duration so minimum time is 3 hours</sub>)</span> 
  						<input type="text" name="time" class="form-control" required="" /> <br> -->
  						<input type="submit" class="btn btn-success" /><br><br>
					</form>                          

                            <h4>IPs</h4>
                            <table class="table table-bordered">
            <tbody>
                <tr>
                    
                    <td><b>White Listed IP Address:</b></td>

                    <td>
                        @foreach ($results->output->whitelist_list as $result) <a href="white/{{ $result }}"> <b>  {{ print_r($result)}}</b></a> <br>  @endforeach
                    </td>   
                </tr>

                <tr>
                
                    <td><b>Black Listed IP Address:</b> </td>

                    <td>
                        @foreach ($results->output->blacklist_list as $result) <a href="black/{{ $result }}"> <b>  {{ print_r($result)}}</b></a> <br> @endforeach 
                   </td>
                </tr>
                

          

           
            </tbody>
        </table>

        

                        </div>
                    </div>
                </div>
            </div>









@stop

@section('javascript') 
    
@endsection
