@extends("admin.layouts.app")
@section("after_css")
    <link href="html/dist/assets/css/pages/mailbox.css" rel="stylesheet"/>
@endsection
@section("content")
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Mail View</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Mail View</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <a class="btn btn-info btn-block" href="mail_compose.html"><i class="fa fa-edit"></i> Compose</a><br>
                <h6 class="m-t-10 m-b-10">FOLDERS</h6>
                <ul class="list-group list-group-divider inbox-list">
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-inbox"></i> Inbox (6)
                            <span class="badge badge-warning badge-square pull-right">17</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-envelope-o"></i> Sent</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-star-o"></i> Important
                            <span class="badge badge-success badge-square pull-right">2</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-file-text-o"></i> Drafts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-trash-o"></i> Trash</a>
                    </li>
                </ul>
                <h6 class="m-t-10 m-b-10">LABELS</h6>
                <ul class="list-group list-group-divider inbox-list">
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-success"></i> Support</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-warning"></i> Business</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-info"></i> Work</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-danger"></i> System</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"><i class="fa fa-circle-o font-13 text-muted"></i> Social</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="ibox" id="mailbox-container">
                    <div class="mailbox-header d-flex justify-content-between"
                         style="border-bottom: 1px solid #e8e8e8;">
                        <div>
                            <h5 class="inbox-title">Save your time. Choose the best.</h5>
                            <div class="m-t-5 font-13">
                                <span class="font-strong">Olivia Smith</span>
                                <a class="text-muted m-l-5" href="javascript:;">olivia.smith@gmail.com</a>
                            </div>
                            <div class="p-r-10 font-13">Mar 26</div>
                        </div>
                        <div class="inbox-toolbar m-l-20">
                            <button class="btn btn-default btn-sm" data-action="reply" data-toggle="tooltip"
                                    data-original-title="Reply"><i class="fa fa-reply"></i></button>
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete"><i
                                    class="fa fa-trash-o"></i></button>
                            <button class="btn btn-default btn-sm" data-toggle="tooltip"
                                    data-original-title="Mark as important"><i class="fa fa-star-o"></i></button>
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Reply"><i
                                    class="fa fa-print"></i></button>
                        </div>
                    </div>
                    <div class="mailbox-body">
                        <p>Hello admin. Can you help me?</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to
                            make a type specimen book. <strong>It has survived</strong> not only five centuries.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley</p>
                        <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="mailbox-body">
                        <div class="d-flex justify-content-between m-b-10">
                            <span class="font-strong"><i class="fa fa-paperclip"></i> 3 attachments</span>
                            <button class="btn btn-default btn-sm" data-action="reply" data-toggle="tooltip"
                                    data-original-title="Download all"><i class="fa fa-download"></i></button>
                        </div>
                        <div class="mail-attachments d-flex">
                            <div class="card">
                                <div>
                                    <img class="card-img-top file-image" src="./assets/img/blog/storm.jpg"/>
                                </div>
                                <div class="card-body">
                                    <span>storm.jpg</span>
                                    <a class="btn btn-default btn-xs float-right" href="javascript:;"><i
                                            class="fa fa-download"></i></a>
                                </div>
                            </div>
                            <div class="card">
                                <div>
                                    <img class="card-img-top file-image" src="./assets/img/blog/horse.jpg"/>
                                </div>
                                <div class="card-body">
                                    <span>horse.jpg</span>
                                    <a class="btn btn-default btn-xs float-right" href="javascript:;"><i
                                            class="fa fa-download"></i></a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="text-center">
                                    <img class="card-img-top file-image" src="./assets/img/file.png" height="160px"/>
                                </div>
                                <div class="card-body">
                                    <span>document.txt</span>
                                    <a class="btn btn-default btn-xs float-right" href="javascript:;"><i
                                            class="fa fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@section("after_js")
    <script src="html/dist/assets/js/scripts/mailbox.js" type="text/javascript"></script>
@endsection
