<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">Dung</span>
            <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />

            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span
                class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
        </div>
    </div>
    <div
        class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
            style="background-image: url(assets/media/bg/bg-1.jpg)">
            <div class="kt-user-card__avatar">
                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
            </div>
            <div class="kt-user-card__name">
                Dung Scuti
            </div>
        </div>

        <!--end: Head -->

        <!--begin: Navigation -->
        <div class="kt-notification">
            <a href="{{ route('profile.edit') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        Change personal information
                    </div>
                </div>
            </a>
            <a href="{{ route('auth.password.edit') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-shield"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        Change password
                    </div>
                </div>
            </a>

            <div class="kt-notification__custom kt-space-between">
                <a href="custom/user/login-v2.html" target="_blank"
                    class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
            </div>
        </div>
        <!--end: Navigation -->
    </div>
</div>
