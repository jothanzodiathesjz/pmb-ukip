<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Account</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Account Settings </a>
                                </li>
                                <li class="breadcrumb-item active"> Account
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                    class="me-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="me-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item"
                                href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                    class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                    class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">

                            <a class="nav-link {{$nav == 'biodata' ? 'active' : ''}}" wire:click="handleNav('biodata')">
                                <div wire:ignore><i data-feather="user" class="font-medium-3 me-50"></i></div>
                                <span class="fw-bold">Biodata </span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link {{$nav == 'sekolah' ? 'active' : ''}}" data-content="sekolah"
                                wire:click="handleNav('sekolah')">
                                <div wire:ignore><i data-feather="lock" class="font-medium-3 me-50"></i></div>
                                <span class="fw-bold">Asal Sekolah</span>
                            </a>
                        </li>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link {{$nav == 'pekerjaan' ? 'active' : ''}}"
                                wire:click="handleNav('pekerjaan')">
                                <div wire:ignore><i data-feather="bookmark" class="font-medium-3 me-50"></i></div>
                                <span class="fw-bold">Jurusan</span>
                            </a>
                        </li>
                        <!-- notification -->
                        <li class="nav-item">
                            <a class="nav-link {{$nav == 'wali' ? 'active' : ''}}" wire:click="handleNav('wali')">
                                <div wire:ignore><i data-feather="bell" class="font-medium-3 me-50"></i></div>
                                <span class="fw-bold">Wali</span>
                            </a>
                        </li>
                        <!-- connection -->
                        <li class="nav-item">
                            <a class="nav-link {{$nav == 'others' ? 'active' : ''}}" wire:click="handleNav('others')">
                                <div wire:ignore><i data-feather="bell" class="font-medium-3 me-50"></i></div>
                                <span class="fw-bold">Lain-lain</span>
                            </a>
                        </li>
                    </ul>

                    <!-- profile -->
                    <div id="sub-content" class="card">
                        @if ($nav == 'biodata')
                        <livewire:biodata />
                        @elseif ($nav == 'sekolah')
                        <livewire:sekolah />
                        @elseif ($nav == 'pekerjaan')
                        <livewire:pekerjaan />
                        @elseif ($nav == 'wali')
                        <livewire:wali />
                        @elseif ($nav == 'others')
                        <livewire:others />
                        @endif
                    </div>
                </div>
            </div>

        </div>
        {{-- @push('scripts')
        <script>
            eve $(window).on('load', function() {
            console.log('kontol');
            })
        </script>
        @endpush --}}
    </div>

</div>