@extends('admin-side.setup.master')

@section('content')
    <main class="pv3 pv4-ns">

        <div class="container">
            <div class="alert alert-warning">Please add your credit to create your own posts here:
                <a href="#">Add credit</a>
            </div>
        </div>
        <br>
        <div class="dashboard crop-avatar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-3 dn db-ns">
                        <div class="mb3">
                            <div class="sidebar-profile">
                                <div class="avatar-container mb-2">
                                    <div class="profile-image">
                                        <div class="avatar-view mt-card-avatar mt-card-avatar-circle"
                                            style="max-width: 150px" data-bs-original-title="" title="">
                                            <img src="{{ asset('public/assets/vendor/core/core/base/images/placeholder.png') }}"
                                                alt="No Image" class="br-100" style="width: 150px;">
                                            <div class="mt-overlay br2">
                                                <span><i class="fa fa-edit" data-toggle="modal" data-target="#profileModal"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="f4 b">{{ Auth::user()->name ?? '' }}</div>
                                <div class="f6 mb3 light-gray-text">
                                    <i class="fas fa-envelope mr2"></i><a href="{{ url('admin/dashboard') }}"
                                        class="gray-text">{{ Auth::user()->email ?? '' }}</a>
                                </div>
                                <div class="mb3">
                                    <div class="light-gray-text mb2">
                                        <i class="fas fa-calendar-alt mr2"></i>Joined
                                        {{ Auth::user()->created_at->format('M-d-Y') ?: '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mb-3">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="white">
                                    <div class="br2 pa3 bg-light-blue mb3" style="box-shadow: 0 1px 1px #ccc;">
                                        <div class="media-body">
                                            <div class="f3">
                                                <span class="fw6">0</span>
                                                <span class="fr"><i class="far fa-check-circle"></i></span>
                                            </div>
                                            <p>Approved properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="white">
                                    <div class="br2 pa3 bg-light-red mb3" style="box-shadow: 0 1px 1px #ccc;">
                                        <div class="media-body">
                                            <div class="f3">
                                                <span class="fw6">0</span>
                                                <span class="fr"><i class="fas fa-user-clock"></i></span>
                                            </div>
                                            <p>Pending approve properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="white">
                                    <div class="br2 pa3 bg-light-silver mb3" style="box-shadow: 0 1px 1px #ccc;">
                                        <div class="media-body">
                                            <div class="f3">
                                                <span class="fw6">0</span>
                                                <span class="fr"><i class="far fa-edit"></i></span>
                                            </div>
                                            <p>Rejected properties</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="app-real-estate">
                            <div class="bg-white br2 pa3" style="box-shadow: rgb(217, 217, 217) 0px 1px 1px;">
                                <ul role="tablist" class="nav" style="border-bottom: 1px solid rgb(217, 217, 217);">
                                    <li class="nav-item gray-text"><a data-bs-toggle="tab" href="#"
                                            class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db show active b"
                                            style="text-decoration: none; line-height: 32px;">Activity Logs</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="activity-logs" class="tab-pane fade show active">
                                        <div class="tc pv3">
                                            <div class="m-auto" style="width: 20px;">
                                                <div data-v-31ad46aa="" class="half-circle-spinner"
                                                    style="height: 15px; width: 15px;">
                                                    <div data-v-31ad46aa="" class="circle circle-1"
                                                        style="border-top-color: rgb(128, 128, 128); border-width: 1.5px; animation-duration: 1000ms;">
                                                    </div>
                                                    <div data-v-31ad46aa="" class="circle circle-2"
                                                        style="border-bottom-color: rgb(128, 128, 128); border-width: 1.5px; animation-duration: 1000ms;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="avatar-form" method="post" action="#" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong>Change
                                        avatar</strong></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="avatar-body">

                                    <!-- Upload image and data -->
                                    <div class="avatar-upload">
                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                        <input class="avatar-data" name="avatar_data" type="hidden">
                                        <input type="hidden" name="_token"
                                            value="Bxl4NQiRvx3EJiWo4s1Ms4xR3yKXgOJixJGJ5n9d"> <label for="avatarInput">New
                                            image</label>
                                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                    </div>

                                    <div class="loading" tabindex="-1" role="img" aria-label="Loading...">
                                    </div>

                                    <!-- Crop and preview -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="avatar-wrapper"></div>
                                        </div>
                                        <div class="col-md-3 avatar-preview-wrapper">
                                            <div class="avatar-preview preview-lg"><img
                                                    src="..//vendor/core/core/base/images/placeholder.png">
                                            </div>
                                            <div class="avatar-preview preview-md"><img
                                                    src="..//vendor/core/core/base/images/placeholder.png">
                                            </div>
                                            <div class="avatar-preview preview-sm"><img
                                                    src="..//vendor/core/core/base/images/placeholder.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary avatar-save" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div>

        <!-- The Modal -->
        <div class="modal" id="profileModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // alert('d');
        });
    </script>
@endsection
