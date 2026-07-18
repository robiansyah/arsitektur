@extends('layouts.main')
@section('title', __('profile.profile'))
@section('content')
    <!-- Toolbar -->
    <div class="pb-5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
            <div class="flex items-center flex-wrap gap-1 lg:gap-5">
                <h1 class="font-medium text-lg text-mono">
                    Profil Saya
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="{{ route('home') }}">Home</a>
                    <span class="text-muted-foreground text-sm">/</span>
                    <span class="text-secondary-foreground">Profil Saya</span>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    @include('partials.alerts')
                    <div class="kt-card min-w-full">
                        <div class="kt-card-header" id="basic_settings">
                            <h3 class="kt-card-title">
                                {{ __('profile.profile') }}
                            </h3>
                        </div>
                        <div class="kt-card-content grid gap-5">
                            <form method="POST" action="{{ route('user.update') }}"
                                class="flex flex-col gap-5" enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Foto Profil
                                    </label>
                                    <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                                        <span class="text-sm">
                                            150x150px JPEG, PNG Image
                                        </span>
                                        <div class="kt-image-input size-16" data-kt-image-input="true">
                                            <input accept=".png, .jpg, .jpeg" name="avatar" type="file">
                                            <input name="avatar_remove" type="hidden" />
                                            <button class="kt-image-input-remove" data-kt-image-input-remove="true"
                                                data-kt-tooltip="true" data-kt-tooltip-placement="right"
                                                data-kt-tooltip-trigger="hover" type="button">
                                                <i class="ki-filled ki-cross">
                                                </i>
                                                <span class="kt-tooltip" data-kt-tooltip-content="true">
                                                    Click to remove or revert
                                                </span>
                                            </button>
                                            <div class="kt-image-input-placeholder border-2 border-green-500 kt-image-input-empty:border-input"
                                                data-kt-image-input-placeholder="true"
                                                style="background-image:url(assets/media/avatars/blank.png)">
                                                <div class="kt-image-input-preview" data-kt-image-input-preview="true"
                                                    style="background-image:url('{{ $data->avatar ? asset('storage/' . $data->avatar) : asset('assets/media/avatars/blank.png') }}')">
                                                </div>
                                                <div
                                                    class="flex items-center justify-center cursor-pointer h-5 left-0 right-0 bottom-0 bg-black/25 absolute">
                                                    <svg class="fill-border opacity-80" height="12" viewbox="0 0 14 12"
                                                        width="14" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.6665 2.64585H11.2232C11.0873 2.64749 10.9538 2.61053 10.8382 2.53928C10.7225 2.46803 10.6295 2.36541 10.5698 2.24335L10.0448 1.19918C9.91266 0.931853 9.70808 0.707007 9.45438 0.550249C9.20068 0.393491 8.90806 0.311121 8.60984 0.312517H5.38984C5.09162 0.311121 4.799 0.393491 4.5453 0.550249C4.2916 0.707007 4.08701 0.931853 3.95484 1.19918L3.42984 2.24335C3.37021 2.36541 3.27716 2.46803 3.1615 2.53928C3.04584 2.61053 2.91234 2.64749 2.7765 2.64585H2.33317C1.90772 2.64585 1.49969 2.81486 1.19885 3.1157C0.898014 3.41654 0.729004 3.82457 0.729004 4.25002V10.0834C0.729004 10.5088 0.898014 10.9168 1.19885 11.2177C1.49969 11.5185 1.90772 11.6875 2.33317 11.6875H11.6665C12.092 11.6875 12.5 11.5185 12.8008 11.2177C13.1017 10.9168 13.2707 10.5088 13.2707 10.0834V4.25002C13.2707 3.82457 13.1017 3.41654 12.8008 3.1157C12.5 2.81486 12.092 2.64585 11.6665 2.64585ZM6.99984 9.64585C6.39413 9.64585 5.80203 9.46624 5.2984 9.12973C4.79478 8.79321 4.40225 8.31492 4.17046 7.75532C3.93866 7.19572 3.87802 6.57995 3.99618 5.98589C4.11435 5.39182 4.40602 4.84613 4.83432 4.41784C5.26262 3.98954 5.80831 3.69786 6.40237 3.5797C6.99644 3.46153 7.61221 3.52218 8.1718 3.75397C8.7314 3.98576 9.2097 4.37829 9.54621 4.88192C9.88272 5.38554 10.0623 5.97765 10.0623 6.58335C10.0608 7.3951 9.73765 8.17317 9.16365 8.74716C8.58965 9.32116 7.81159 9.64431 7 9.64585Z">
                                                        </path>
                                                        <path
                                                            d="M7 8.77087C8.20812 8.77087 9.1875 7.7915 9.1875 6.58337C9.1875 5.37525 8.20812 4.39587 7 4.39587C5.79188 4.39587 4.8125 5.37525 4.8125 6.58337C4.8125 7.7915 5.79188 8.77087 7 8.77087Z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Nama Lengkap
                                    </label>
                                    <input class="kt-input" placeholder="Nama Lengkap" type="text" name="name"
                                        value="{{ $data->name }}" required/>
                                </div>
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Email
                                    </label>
                                    <input class="kt-input" placeholder="Email" type="text" name="email"
                                        value="{{ $data->email }}" required/>
                                </div>
                                <div class="flex justify-end">
                                    <button class="kt-btn kt-btn-primary" type="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="kt-card min-w-full">
                        <div class="kt-card-header" id="basic_settings">
                            <h3 class="kt-card-title">
                                Ganti Password
                            </h3>
                        </div>
                        <div class="kt-card-content grid gap-5">
                            <form method="POST" action="{{ route('user.password') }}" class="flex flex-col gap-5">
                                @csrf
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Password Lama
                                    </label>
                                    <div class="kt-input" data-kt-toggle-password="true">
                                        <input name="password_old" placeholder="Password Lama" type="password" value="" />
                                        <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                                            data-kt-toggle-password-trigger="true" type="button">
                                            <span class="kt-toggle-password-active:hidden">
                                                <i class="ki-filled ki-eye text-muted-foreground">
                                                </i>
                                            </span>
                                            <span class="hidden kt-toggle-password-active:block">
                                                <i class="ki-filled ki-eye-slash text-muted-foreground">
                                                </i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Password Baru
                                    </label>
                                    <div class="kt-input" data-kt-toggle-password="true">
                                        <input name="password" placeholder="Password Baru" type="password" value="" />
                                        <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                                            data-kt-toggle-password-trigger="true" type="button">
                                            <span class="kt-toggle-password-active:hidden">
                                                <i class="ki-filled ki-eye text-muted-foreground">
                                                </i>
                                            </span>
                                            <span class="hidden kt-toggle-password-active:block">
                                                <i class="ki-filled ki-eye-slash text-muted-foreground">
                                                </i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label class="kt-form-label max-w-56">
                                        Konfirmasi Password
                                    </label>
                                    <div class="kt-input" data-kt-toggle-password="true">
                                        <input name="password_confirmation" placeholder="Konfirmasi Password" type="password" value="" />
                                        <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                                            data-kt-toggle-password-trigger="true" type="button">
                                            <span class="kt-toggle-password-active:hidden">
                                                <i class="ki-filled ki-eye text-muted-foreground">
                                                </i>
                                            </span>
                                            <span class="hidden kt-toggle-password-active:block">
                                                <i class="ki-filled ki-eye-slash text-muted-foreground">
                                                </i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button class="kt-btn kt-btn-primary" type="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
@stop
