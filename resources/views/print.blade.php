<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mir Lab Reporting</title>
        <link href="https://fonts.googleapis.com/css2?family=Piazzolla:wght@400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset("lab/css/main.css")}}" />
        <style type="text/css" media="print">
            @page{
                size: auto  landscape;
                margin: 8mm;
                }
        
            .d{
                width: 100%;
            }
            </style>
    </head>
    <body>
        @foreach ($list as $info)
        <div class="page_break">
            <header>
                <div class="brand">
                    <img src="{{asset("lab/img/logo.png")}}" class="logo" alt="Logo" />
                    <h1 class="brand--name">Mir Clinical Lab</h1>
                </div>
                <div class="clear"></div>
                <p class="brand--description">Mir Hospital, Service More, GT Road Gujrat, Contact # 053-3726616</p>
            </header>
    
            <main class="main" >
                <div class="overlay">
                    <hr class="space--line" />
    
                    <table class="patient--info">
                        <tbody>
                            <tr>
                                <td class="bold">Name</td>
                                <td>{{$info[0]->patient_name}}</td>
    
                                <td class="bold">Reffered by</td>
                                <td>{{$info[0]->referred_by}}</td>
                            </tr>
    
                            <tr>
                                <td class="bold">Age/sex</td>
                                <td>{{$info[0]->age}} /{{$info[0]->gender ==1?"Male":"Female"}} </td>
    
                                <td class="bold">Registration #.</td>
                                <td>{{$info[0]->patient_id}}</td>
                            </tr>
    
                            <tr>
                                <td class="bold">Email</td>
                                <td>{{$info[0]->email}}</td>
    
                                <td class="bold">Date & Time</td>
                                <td>{{$info[0]->registration_date}}</td>
                            </tr>
    
                            <tr>
                                <td class="bold">Contact #.</td>
                                <td>{{$info[0]->phone_no}}</td>
    
                                <td class="bold">Reporting</td>
                                <td>{{date('Y-m-d H:i:s')}}</td>
                            </tr>
                        </tbody>
                    </table>
    
                    <hr class="space--line" />
                    <h1>{{$info[0]->group_name}}</h1>
                    <table class="report--info">
                        <thead>
                            <tr>
                                <th>Test</th>
                                <th>Result</th>
                                <th>Unit</th>
                                <th>Normal Ranges</th>
                                {{-- <th>Detail</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $item)
                            <tr>
                                <td class="bold text-center">{{$item->test_name}}</td>
                                <td class="bold">{{$item->values}}</td>
    
                                <td class="bold">{{$item->unit_name}}</td>
                                <td style="text-align: left">{!! nl2br($item->prference_range)!!}</td>
                                {{-- <td>{{ $item->detail }}</td> --}}
                                {{-- <td class="text-right">  {!! nl2br($item->detail) !!}</td> --}}
                                
                            </tr>
                            <tr>
                               <td colspan="4" style="padding-top:5px; text-align: left">{!! nl2br($item->detail) !!}</td>  
                            </tr>
                            @endforeach
                        </tbody>
    
                        <tfoot>
                            <tr>
                                <td class="bold" colspan="5"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </main>
    
            <footer class="footer">
                <p class="text-center bold" style="-webkit-print-color-adjust: exact">Electronically Verified Report. No signatures needed. (Not Valid For Court)</p>
                <p class="footer--text text-center bold">Mir Hospital, Service More, GT Road Gujrat, Contact # 053-3726616</p>
                
            </footer>
        </div>
        @endforeach
    </body>
</html>
@php
    $link = "/admin/test-report";
    if(!Auth::user()){
      $link = "/";
    }
@endphp
<script>
   
    window.onafterprint=(()=>{
        window.location.href=`<?= $link ?>`;
    })
    window.onload=(()=>{
        window.print();
    })
</script>