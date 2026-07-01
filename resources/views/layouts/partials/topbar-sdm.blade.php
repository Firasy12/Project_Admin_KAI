<div class="topbar">

    <div>

        <h2>

            Dashboard SDM

        </h2>

        <span>

            Selamat datang kembali.

        </span>

    </div>

    <div class="right-menu">

        <div class="notification">

            <i class="fa-solid fa-bell"></i>

            <span class="badge-notif">

                3

            </span>

        </div>

        <div class="profile-card">

            <img src="{{ asset('images/avatar.png') }}">

            <div>

                <strong>

                    {{ Auth::user()->name ?? 'Admin SDM' }}

                </strong>

                <br>

                <small>

                    Human Capital

                </small>

            </div>

        </div>

    </div>

</div>