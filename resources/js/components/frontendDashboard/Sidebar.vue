<template>
  <div>
    <!-- Desktop Sidebar -->
    <aside
      class="z-20 hidden w-64 h-screen overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
    >
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
          Author Dashboard
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100" href="#">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l2-2 7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2v10a1 1 0 01-1 1h-3m-6 0v-4a1 1 0 011-1h2a1 1 0 011 1v4" />
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>

        <!-- More menu items here -->
        <ul>
          <li class="relative px-6 py-3">
            <button
              class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              @click="togglePagesMenu"
            >
              <span class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path
                    d="M4 5h16M4 13h6v6H4v-6zm12 0h4v6h-4v-6zM4 9h16v2H4V9z"
                  />
                </svg>
                <span class="ml-4">Pages</span>
              </span>
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>

            <!-- Submenu -->
            <transition name="fade">
              <ul
                v-if="isPagesMenuOpen"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu"
              >
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/login.html" class="w-full block">Login</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/create-account.html" class="w-full block">Create account</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/forgot-password.html" class="w-full block">Forgot password</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/404.html" class="w-full block">404</a>
                </li>
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-200">
                  <a href="pages/blank.html" class="w-full block">Blank</a>
                </li>
              </ul>
            </transition>
          </li>
        </ul>

        <div class="px-6 my-6">
          <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700">
            Create account
            <span class="ml-2" aria-hidden="true">+</span>
          </button>
        </div>
      </div>
    </aside>

    <!-- Mobile Sidebar Backdrop -->
    <div
      v-if="isSideMenuOpen"
      @click="closeSideMenu"
      class="fixed inset-0 z-10 bg-black bg-opacity-50"
    ></div>

    <!-- Mobile Sidebar -->
    <transition name="slide">
      <aside
        v-if="isSideMenuOpen"
        class="fixed inset-y-0 z-20 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
      >
        <!-- Same sidebar content can be reused here if needed -->
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">Windmill</a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100" href="#">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M3 12l2-2 7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2v10a1 1 0 01-1 1h-3m-6 0v-4a1 1 0 011-1h2a1 1 0 011 1v4" />
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
    </transition>
  </div>
</template>



<script>
export default {
  data() {
    return {
      isSideMenuOpen: false, // মোবাইল সাইডবার ওপেন/ক্লোজ কন্ট্রোল করে
      isNotificationsMenuOpen: false, // notification dropdown কন্ট্রোল করে
      isPagesMenuOpen: false // Pages সাবমেনু টগল করে
    };
  },
  methods: {
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    }
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
  max-height: 0;
}
.fade-enter-to, .fade-leave-from {
  opacity: 1;
  max-height: 300px;
}

.slide-enter-active, .slide-leave-active {
  transition: all 0.3s ease;
}
.slide-enter-from {
  transform: translateX(-100%);
  opacity: 0;
}
.slide-enter-to {
  transform: translateX(0);
  opacity: 1;
}
.slide-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}
</style>
