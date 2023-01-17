
<div id="account__rows" class="account__rowsss">
    <div class="card test-rec mb-4" >
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="mb-4">Test Info</h5>
                <button class="btn btn-primary btn-sm" type="button" type="button"
                    data-action="duplicate-row" data-target="#account__html"
                    data-insert-target="#account__rows">Add Group</button>
    
                <button class="btn btn-danger btn-sm" type="button" type="button" data-action="remove-row"
                    data-container-target=".test-rec" data-remove-target="#account__rows">Delete Group</button>
            </div>
            <div class="test__html" >
                <div class="row">
                    <div class="col-12 form-group position-relative error-l-50">
                        <label>Select Test</label>
                        <select name="test_group[]" id="test-group" class="form-control test-group">
                            @foreach ($groups as $info)
                                <option  value="{{$info["id"]}}">{{$info["name"]}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('test_group.*')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Test Name</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">REFERENCE RANGE</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">UNIT</label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Results</label>
                    </div>
                </div>
        
                <div class="test-list">
                    <span class="text-danger">{{ $errors-> first('values')}}</span>
                    @foreach ($grouptest as $info)
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                {{$info->test_name}}
                            </div>
                            <div class="col-md-3 mt-2">
                                {!! nl2br($info->prference_range)!!}
                            </div>
                            <div class="col-md-3 mt-2">
                                {{$info->unit_name}}
                            </div>
                            <div class="col-md-3 mt-2">
                                <input type="hidden" name="test_id[{{$info->group_id}}][]" value="{{$info->id}}">
                                <input type="text" name="values[{{$info->group_id}}][]"  class="form-control" placeholder="0">
                            </div>
                        </div>    
                    @endforeach
                
                </div>
            
            </div>
        </div>
    </div>
</div>

<script>
    
    
    $(document).on('change','.test-group',function(){
        let group_id = $(this).val();
        const parent = $(this).closest(".test__html")
        console.log("this",$(this));
        var dataString = 'id='+ group_id;
        var url = '{{route('testreport.testlistajax',":group_id")}}';
        url = url.replace(':group_id', group_id);
        $.ajax
            ({
            type: "GET",
            url: url,
            cache: false,
            success: function(data)
            {
                if(data["status"]){
                    let test_list = data["data"];
                    console.log("test_list",test_list);
                    const  testlist= $(parent).find('.test-list')
                    console.log("testlist",testlist);
                    testlist.html(``)
                    test_list.forEach(element => {
                       testlist.append(`
                        <div class="row">
                        <div class="col-md-3 mt-2">
                            ${element["test_name"]}
                        </div>
                        <div class="col-md-3 mt-2">
                            ${element["prference_range"]}
                        </div>
                        <div class="col-md-3 mt-2">
                            ${element["unit_name"]===null?"":element["unit_name"]}
                        </div>
                        <div class="col-md-3 mt-2">
                            <input type="hidden" name="test_id[${element["group_id"]}][]" value="${element["id"]}">
                            <input type="text" name="values[${element["group_id"]}][]"  class="form-control" placeholder="0">
                        </div>
                    </div>  
                    `)    
                });
                    
                }
            } 
            });
    });

    
</script>