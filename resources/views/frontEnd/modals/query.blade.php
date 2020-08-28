<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="background-image: url(assets/img/blackbg.jpg);">
            <div class="modal-header">
                <h4 class="modal-title">
                    <font color="white"><b>SETUP<font color="#ffc451">.</font> - <font color="#ffc451">Lets start our Journey</font></b></font>
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <font color="white">
                    <h5 align="center">YOU ASK... WE PROVIDE...</h5>
                </font>
                <form action="{{    url('/query')   }}" method="post">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" id="email" class="form-control" placeholder="Enter your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" name="scheduled_at" id="datetimepicker" class="form-control" placeholder="Select time">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" id="mobile" class="form-control" placeholder="Enter your mobile number">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <select id="subject" name="subject" class="form-control">
                                <option id="">Please select subject of query</option>
                                @foreach($services as $service)
                                    <option id="{{$service->id}}">{{$service->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <textarea name="message" id="message" cols="30" rows="2" class="form-control" placeholder="Ask any query from us"></textarea>
                        </div>
                    </div>
                    <div class="form-group" align="right">
                        <center> <a href="#" style="border: 1px solid #444444; background: #ffc451; color:#444444; padding: 8px 12px 8px 12px; border-radius: 10px;" class="scrollto">Enquire</a> </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>