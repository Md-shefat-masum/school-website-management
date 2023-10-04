@extends('frontend.layouts.website')

@section('contents')
<div class="container">

    <div class="login_or_sign_up_area">
        <div class="container">
            <div class="login_or_sign_up_content">
                <form method="POST" onsubmit="submit_login()" action="{{ route('login') }}">
                    @csrf
                    <input name="email" class="input_area" type="text" placeholder="Email or Phone Number">
                    <input name="password" class="input_area" type="password" placeholder="Password">

                    <!-- login_in_area start -->
                    <button class="login_in_area">Login in</button>
                    <!-- login_in_area end -->

                    <!-- forgotten_password_area start -->
                    {{-- <a href="#" class="forgotten_password_area">Forgotten Password?</a> --}}
                    <!-- forgotten_password_area end -->

                    <!-- create_an_account_area start -->
                    {{-- <a href="/register" class="create_an_account_area">Create an Account</a> --}}
                    <!-- create_an_account_area end-->
                </form>

                <script>
                    function submit_login(){
                                event.preventDefault();
                                fetch(event.target.action,{
                                    method: "POST",
                                    body: new FormData(event.target),
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    }
                                })
                                .then(res=>res.json())
                                .then(res=>{
                                    console.log(res);
                                    location.href="/dashboard"
                                })
                            }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
