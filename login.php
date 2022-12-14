<?php
require_once "core/init.php";
$user = new Controllerauth();

if ($user->is_login()) {
    if ($user->is_superAdmin(Session::get('username'))) {
        Redirect::to('dashboard');
    } else {
        Redirect::to('dashboard');
    }
}

if (Session::exists('login')) {
    echo Session::flash('login');
}

$errors = array();


if (isset($_POST['submit'])) {
    if (Token::check(Input::get('token'))) {

        $validation = new Validation();

        // metode check
        $validation = $validation->check(array(
            'username' => array(
                'required' => true,

            ),
            'password' => array(
                'required' => true,

            )

        ));
        // pengujian cek nama
        if ($validation->passed()) {
            if ($user->cek_nama(Input::get('username'))) {
                if ($user->login(Input::get('username'), Input::get('password'))) {
                    Session::set('username', Input::get('username'));
                    // set seasson loksend untuk menentukan lokasi
                    $user_data = $user->get_data(Session::get('username'));
                    $_SESSION['loksend'] = $user_data['lok'];
                    $_SESSION['id_admin'] = $user_data['id_admin'];

                    Redirect::to('dashboard');
                } else {
                    // animate error
                    $errors[] = "Password Yang Anda Masukkan Salah";
                }
            } else {
                // animate error
                $errors[] = "Username Tidak Terdaftar";
            }
        } else {
            // untuk mengisi errornya ke array
            $errors = $validation->errors();
        } // end token
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<!--loader start  -->
<div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
    <span class="loader-103"> </span>
</div>
<!-- loader end -->

<body class="overflow-hidden">
    <div class="h-screen flex bg-neutral_900 ">
        <div class="flex flex-col mx-auto my-auto bg-neutral_800 sm:px-6 lg:px-6 py-8 rounded-xl xs:w-5/6 h-[382px] w-5/6  max-w-md overflow-hidden relative shadow-elevation-dark-4">
            <div class="absolute w-[476px] h-[382px] bg-gradient-to-r from-primary_500 via-primary_500 to-transparent -top-[50%] -left-[50%] animate-spin-slow origin-bottom-right"></div>
            <div class="absolute w-[476px] h-[382px] bg-gradient-to-r from-primary_500 via-primary_500 to-transparent -top-[50%] -left-[50%] animate-spin-delay origin-bottom-right"></div>

            <div class="absolute inset-1 bg-neutral_800 rounded-xl z-10 ">

                <form action="login.php" class="mt-2 p-4" method="post">
                    <div class="font-noto-sans-sans font-medium self-center text-3xl text-primary_500 flex justify-center">
                        Login
                    </div>
                    <h1 class="mt-2 self-center text-md font-noto-sans text-neutral_050 flex justify-center">
                        Silakan login
</h1>
                    <div class="mt-7">

                        <div class="flex flex-col mb-5">
                            <div class="relative z-0 mb-2 w-full group">
                                <input type="text" name="username" id="username" class="block  w-full h-[64px] rounded-xl bg-neutral_050 text-neutral_900 font-noto-sans outline-none focus:text-base pl-[57px] peer" placeholder=" " required />
                                <label for="username" id="usernameLabel" class="peer-focus:font-medium font-noto-sans absolute left-14 top-[21px] text-base duration-300 transform -translate-y-5 scale-75 z-10 origin-[0] peer-focus:left-14 peer-focus:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-5 text-neutral_900">Username</label>
                                <svg class="absolute left-5 top-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.625 13.875H9.875C6.07812 13.875 3 16.9531 3 20.75C3 21.4402 3.55977 22 4.25 22H19.25C19.9402 22 20.5 21.4402 20.5 20.75C20.5 16.9531 17.4219 13.875 13.625 13.875ZM4.91367 20.125C5.22227 17.6602 7.32812 15.75 9.875 15.75H13.625C16.1703 15.75 18.2773 17.6621 18.5859 20.125H4.91367ZM11.75 12C14.5113 12 16.75 9.76133 16.75 7C16.75 4.23867 14.5113 2 11.75 2C8.98867 2 6.75 4.23867 6.75 7C6.75 9.76172 8.98828 12 11.75 12ZM11.75 3.875C13.473 3.875 14.875 5.27695 14.875 7C14.875 8.72305 13.473 10.125 11.75 10.125C10.027 10.125 8.625 8.72266 8.625 7C8.625 5.27695 10.0273 3.875 11.75 3.875Z" fill="black" />
                                </svg>
                            </div>
                            <div class="relative mt-3 mb-2">
                                <input name="password" type="password" id="password" placeholder=" " required class="block  w-full h-[64px] rounded-xl bg-neutral_050 text-neutral_900 font-noto-sans outline-none focus:text-base pl-[57px] peer">
                                <label id="passwordLabel" class="peer-focus:font-medium font-noto-sans absolute left-14 top-5 text-base duration-300 transform -translate-y-5 scale-75 z-10 origin-[0] peer-focus:left-14 peer-focus:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-5 text-neutral_900">Password</label>
                                <svg width="24" class="absolute left-5 top-5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.3641 4.18529C18.1054 2.51807 16.3654 1.80474 14.28 2.0456C10.21 2.51373 7.99626 6.93336 10.0813 10.4413C10.2909 10.7941 10.2438 10.9592 9.98357 11.2174C7.86643 13.3168 5.75642 15.4233 3.65354 17.537C3.5147 17.669 3.38524 17.8106 3.26609 17.9606C2.90957 18.4345 2.9006 18.8061 3.30425 19.2253C4.11387 20.0666 4.94006 20.8921 5.78283 21.7019C6.21655 22.1191 6.69364 22.0859 7.07561 21.6805C7.42924 21.3046 7.41507 20.8709 7.01489 20.4256C6.73557 20.1147 6.44006 19.8184 6.14744 19.5191C5.19904 18.5464 5.20482 18.5539 6.19429 17.6336C6.40045 17.4416 6.51871 17.4601 6.70029 17.6446C7.20168 18.154 7.70653 18.6609 8.23278 19.1452C8.71681 19.592 9.17945 19.5923 9.57009 19.1892C9.95552 18.7916 9.92545 18.3255 9.47264 17.8559C9.00104 17.3664 8.53783 16.867 8.03992 16.4053C7.77766 16.1621 7.8138 16.0166 8.04628 15.7879C9.17723 14.6749 10.2986 13.5525 11.4105 12.4208C11.6193 12.208 11.7532 12.2352 11.9819 12.3809C12.8533 12.9435 13.8723 13.2345 14.9095 13.2168C17.2646 13.0853 19.0689 12.1062 20.0358 9.85173C20.8995 7.83608 20.6702 5.91527 19.3641 4.18529ZM14.9401 11.3825C12.8085 11.3911 11.0985 9.70079 11.115 7.59001C11.1324 5.35952 12.9606 3.81258 14.8933 3.83109C17.0278 3.85277 18.6866 5.46506 18.6968 7.58163C18.7069 9.69819 17.0524 11.3738 14.9413 11.3825H14.9401Z" fill="#303030" />
                                </svg>
                                <svg width="24" onclick="show()" id="showimg" class="absolute right-5 cursor-pointer top-5 z-20" onclick="showPass()" aria-hidden="true" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.70933 6.89903C8.09369 5.82092 9.86868 4.99999 11.9999 4.99999C14.5249 4.99999 16.5467 6.15123 18.0186 7.51871C19.4811 8.87495 20.4592 10.4718 20.9217 11.6156C21.0248 11.8624 21.0248 12.1374 20.9217 12.3843C20.503 13.3937 19.6623 14.8155 18.4249 16.0843L21.7123 18.6592C22.0373 18.9155 22.0967 19.3874 21.8405 19.7124C21.5842 20.0374 21.1123 20.0967 20.7873 19.8405L2.28737 5.3403C1.96137 5.08467 1.90421 4.61343 2.15974 4.28737C2.4153 3.96137 2.88655 3.90421 3.2128 4.15974L6.70933 6.89903ZM7.93119 7.85934L9.36868 8.98433C10.0718 8.37183 10.9937 7.99996 11.9999 7.99996C14.2093 7.99996 15.9999 9.79057 15.9999 11.9999C15.9999 12.6624 15.8405 13.2843 15.5561 13.8343L17.2374 15.153C18.2842 14.0874 19.0592 12.8468 19.4561 11.9999C19.003 11.0343 18.1999 9.73432 16.9967 8.61558C15.7124 7.42497 14.0374 6.47185 11.9999 6.47185C10.4218 6.47185 9.03431 7.05403 7.93119 7.85934ZM14.3405 12.8812C14.4436 12.6062 14.4999 12.3093 14.4999 11.9718C14.4999 10.6187 13.3811 9.47182 11.9999 9.47182C11.978 9.47182 11.9593 9.49995 11.9093 9.49995C11.978 9.65932 11.9999 9.82807 11.9999 9.97182C11.9999 10.3187 11.9249 10.6187 11.7937 10.8843L14.3405 12.8812ZM14.6343 16.953L15.9436 17.9843C14.8093 18.5967 13.4936 18.9999 11.9999 18.9999C9.47493 18.9999 7.45307 17.8499 5.98121 16.4811C4.51935 15.0968 3.54186 13.4999 3.07686 12.3843C2.97436 12.1374 2.97436 11.8624 3.07686 11.6156C3.37498 10.8999 3.88404 9.97494 4.59653 9.04683L5.77496 9.97494C5.19059 10.7031 4.80497 11.4249 4.54529 11.9718C4.96934 12.9374 5.79996 14.2655 7.00308 15.3843C8.28744 16.5749 9.96243 17.4999 11.9999 17.4999C12.9593 17.4999 13.8374 17.2936 14.6343 16.953ZM7.99994 11.9718C7.99994 11.9093 8.00307 11.8218 8.00932 11.7343L9.76243 13.1155C10.0906 13.7749 10.703 14.2687 11.4374 14.4093L13.1937 15.8186C12.8155 15.9093 12.4155 15.9999 11.9718 15.9999C9.79055 15.9999 7.97182 14.2093 7.97182 11.9718H7.99994Z" fill="#303030" />
                                </svg>
                                <svg width="24" onclick="show()" height="24" id="hideimg" class="absolute right-5 cursor-pointer hidden top-5 z-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5558 11.7781C7.5558 9.32315 9.54547 7.33348 12.0004 7.33348C14.4554 7.33348 16.4451 9.32315 16.4451 11.7781C16.4451 14.2331 14.4554 16.2227 12.0004 16.2227C9.54547 16.2227 7.5558 14.2331 7.5558 11.7781ZM12.0004 14.556C13.5352 14.556 14.7783 13.3129 14.7783 11.7781C14.7783 10.2433 13.5352 9.00022 12.0004 9.00022C11.9761 9.00022 11.9553 9.00022 11.8997 9.00022C11.9761 9.17731 12.0004 9.36481 12.0004 9.5558C12.0004 10.7815 11.0039 11.7781 9.77812 11.7781C9.58714 11.7781 9.39963 11.7538 9.22254 11.6774C9.22254 11.733 9.22254 11.7538 9.22254 11.7469C9.22254 13.3129 10.4656 14.556 12.0004 14.556ZM5.31334 6.79873C6.94813 5.27922 9.19476 4 12.0004 4C14.8061 4 17.0527 5.27922 18.6882 6.79873C20.3133 8.30574 21.4002 10.0801 21.9141 11.351C22.0286 11.6253 22.0286 11.9309 21.9141 12.2052C21.4002 13.4449 20.3133 15.2192 18.6882 16.7575C17.0527 18.2784 14.8061 19.5562 12.0004 19.5562C9.19476 19.5562 6.94813 18.2784 5.31334 16.7575C3.68827 15.2192 2.60211 13.4449 2.08546 12.2052C1.97151 11.9309 1.97151 11.6253 2.08546 11.351C2.60211 10.0801 3.68827 8.30574 5.31334 6.79873ZM12.0004 5.66674C9.73645 5.66674 7.87526 6.69456 6.44811 8.01753C5.11125 9.26064 4.18829 10.7052 3.71675 11.7781C4.18829 12.8198 5.11125 14.2956 6.44811 15.5387C7.87526 16.8617 9.73645 17.8895 12.0004 17.8895C14.2644 17.8895 16.1256 16.8617 17.5528 15.5387C18.8896 14.2956 19.782 12.8198 20.2855 11.7781C19.782 10.7052 18.8896 9.26064 17.5528 8.01753C16.1256 6.69456 14.2644 5.66674 12.0004 5.66674Z" fill="#303030" />
                                </svg>
                            </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            <div class="flex w-full">
                                <button @click.prevent="open = true" aria-controls="basic-modal" id="login" type="submit" name="submit" class="flex justify-center items-center bg-primary_500 font-noto-sans font-semibold rounded-xl mt-5 h-[48px] w-full transition duration-150 ease-in text-neutral_900">Login</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php if (!empty($errors)) { ?>
        <?php foreach ($errors as $error) { ?>
            <!-- alert login -->
            <script>
                Swal.fire({
                    background: '#fff',
                    icon: 'error',
                    // text color white
                    html: '<h2 class="text-neutral_900 font-medium"><?php echo $error; ?></h2>',
                    showConfirmButton: false,
                    // opacity
                    backdrop: `rgba(0,0,0,0.5)`,
                    timer: 1700
                })
            </script>
        <?php  } ?>
    <?php } ?>
    <!-- <script src="assets/js/main.js"></script> -->
    <script>
        const show = () => {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("showimg").classList.add("hidden");
                document.getElementById("hideimg").classList.remove("hidden");
            } else {
                x.type = "password";
                document.getElementById("showimg").classList.remove("hidden");
                document.getElementById("hideimg").classList.add("hidden");
                labelInput.classList.remove("text-transparent");
            }
        };
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
        const login = document.getElementById('login');

        login.addEventListener('click', function() {
            localStorage.setItem('lokasi', 'Bojonegoro');
        });
    </script>
</body>

</html>
