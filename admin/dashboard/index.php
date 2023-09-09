<?php
require_once '../../config/app.php';

if (!isset($_SESSION['AUTHENTICATED'])) {
    header('Location: login/index.php'); // todo: create a function and a DIR const for invalid session
}

// Add lottery ticket
$required_fields = ['confirmation_code', 'confirmation_date', 'prize_won', 'ticket_value'];
$has_error = false;

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
        $lottery = R::dispense('results');

        $lottery->confirmation_code = $_POST['confirmation_code'];
        $lottery->confirmation_date = $_POST['confirmation_date'];
        $lottery->prize_won = $_POST['prize_won'];
        $lottery->ticket_value = $_POST['ticket_value'];

        R::store($lottery);

        $success_message = 'Lottery results successfully added';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= APP_NAME; ?> - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"/>
</head>
<body>
    <section class="container mx-auto my-12">
        <header class="text-center">
            <h1 class="text-4xl">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </span>
                <span>Lotteries</span>
            </h1>

            <a class="text-red-600 font-semibold" href="logout/index.php">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
            </span>
                <span>Logout</span>
            </a>
        </header>

        <main>
            <div style="width: 700px" class="my-20 mx-auto">
                <div class="mb-4">
                    <a class="bg-black text-white rounded px-4 py-1 items-center" href="">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span>Add Lottery</span>
                    </a>
                    <div class="w-100 h-100 bg-blue-100 my-6 rounded p-3">
                        <div class="mb-6">
                            <?php if(!empty($error_message)): ?>
                                 <span class="block text-sm text-red-600 mt-8 flex items-center">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?= $error_message; ?>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-6">
                            <?php if(!empty($success_message)): ?>
                                 <span class="block text-sm text-green-600 mt-8 flex items-center">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?= $success_message; ?>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="flex flex-col mb-5">
                                    <label
                                        for="confirmation_code"
                                        class="mb-1 text-xs tracking-wide text-gray-600"
                                    >Confirmation Code Or Ticket #:</label>
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
                                            id="confirmation_code"
                                            type="text"
                                            name="confirmation_code"
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
                                            placeholder="Confirmation Code Or Ticket #"
                                        />
                                    </div>

                                    <!--                        --><?php //if($ture = 1): ?>
                                    <!--                            <span class="ml-4 text-sm text-red-500">The email address field is required</span>-->
                                    <!--                        --><?php //endif; ?>

                                </div><div class="flex flex-col mb-5">
                                    <label
                                        for="confirmation_date"
                                        class="mb-1 text-xs tracking-wide text-gray-600"
                                    >Confirmation Date:</label>
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
                                            id="confirmation_date"
                                            type="date"
                                            name="confirmation_date"
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
                                            placeholder="Confirmation Date"
                                        />
                                    </div>

                                    <!--                        --><?php //if($ture = 1): ?>
                                    <!--                            <span class="ml-4 text-sm text-red-500">The email address field is required</span>-->
                                    <!--                        --><?php //endif; ?>

                                </div><div class="flex flex-col mb-5">
                                    <label
                                        for="prize_won"
                                        class="mb-1 text-xs tracking-wide text-gray-600"
                                    >Prize Won:</label>
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
                                            id="prize_won"
                                            type="text"
                                            name="prize_won"
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
                                            placeholder="Prize Won"
                                        />
                                    </div>

                                    <!--                        --><?php //if($ture = 1): ?>
                                    <!--                            <span class="ml-4 text-sm text-red-500">The email address field is required</span>-->
                                    <!--                        --><?php //endif; ?>

                                </div><div class="flex flex-col mb-5">
                                    <label
                                        for="ticket_value"
                                        class="mb-1 text-xs tracking-wide text-gray-600"
                                    >Ticket Value:</label>
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
                                            id="ticket_value"
                                            type="text"
                                            name="ticket_value"
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
                                            placeholder="Ticket Value"
                                        />
                                    </div>

                                    <!--                        --><?php //if($ture = 1): ?>
                                    <!--                            <span class="ml-4 text-sm text-red-500">The email address field is required</span>-->
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
                                        <span class="mr-2 uppercase">Add</span>
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
                <div class="shadow-xl border border-gray-100 p-12">
                    log
                </div>
            </div>
        </main>
    </section>
</body>
</html>