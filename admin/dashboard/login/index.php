<?php
require_once '../../../config/app.php';

if (isset($_SESSION['AUTHENTICATED'])) {
    header('Location: ../index.php');
}

$required_fields = ['email', 'password'];
$credentials = [];
$has_error = false;
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $has_error = true;
        }
    }

    if ($has_error) {
        $error_message = 'All fields are required';
    }

    if (!$has_error) {
        if (login($_POST['email'], $_POST['password'])) {
            header('Location: ../');
        } else {
            $error_message = 'Invalid username or password';
        }
    }
}

function login($email, $password) {
    $user = R::findOne('users', 'username=?', [$email]);

//    return password_hash('secret', PASSWORD_DEFAULT);

    if (password_verify($password, $user->password)) {
        $_SESSION['AUTHENTICATED'] = true;
        return true;
    }

    return false;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= APP_NAME; ?> - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
        crossorigin="anonymous"/>
    </head>
    <body>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div
            class="flex flex-col
          bg-white
          shadow-md
          px-4
          sm:px-6
          md:px-8
          lg:px-10
          py-8
          rounded-3xl
          w-50
          max-w-md
        ">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
                Welcome Back
            </div>
            <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
                Enter your credentials to access your account
            </div>

            <div>
                <?php if(!empty($error_message)): ?>
                   <span class="block text-sm text-red-600 mt-8">
                        <?= $error_message; ?>
                   </span>
                <?php endif; ?>
            </div>

            <div class="mt-10">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="flex flex-col mb-5">
                        <label
                            for="email"
                            class="mb-1 text-xs tracking-wide text-gray-600"
                        >E-Mail Address:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  "
                            >
                                <i class="fas fa-at text-blue-500"></i>
                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Enter your email"
                            />
                        </div>

<!--                        --><?php //if($ture = 1): ?>
<!--                            <span class="ml-4 text-sm text-red-500">The email address field is required</span>-->
<!--                        --><?php //endif; ?>

                    </div>
                    <div class="flex flex-col mb-6">
                        <label
                            for="password"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600"
                        >Password:</label
                        >
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  "
                            >
                  <span>
                    <i class="fas fa-lock text-blue-500"></i>
                  </span>
                            </div>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Enter your password"
                            />
                        </div>

<!--                        --><?php //if($ture = 1): ?>
<!--                            <span class="ml-4 text-sm text-red-500">The password field is required</span>-->
<!--                        --><?php //endif; ?>

                    </div>

                    <div class="flex w-full">
                        <button
                            type="submit"
                            name="doLogin"
                            class="
                  flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in
                "
                        >
                            <span class="mr-2 uppercase">Sign In</span>
                            <span>
                  <svg
                      class="h-6 w-6"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>