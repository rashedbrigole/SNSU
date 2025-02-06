<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const currentRoute = computed(() => usePage().url);

const isActive = (path) => {
  return currentRoute.value === path;
};

const navigateToAddNew = () => {
  router.visit('/add-new');
};
</script>

<template>
  <div class="sidebar">
    <div class="logo-sec">
      <img class="logo" src="/assets/logo.png" alt="University logo" />
      <h1 class="logo-text">Dashboard</h1>
    </div>
    <div class="separator">
      <hr class="solid" />
    </div>
    <div class="dashboard-list">
      <div class="not-flex">
        <Link 
          href="/dashboard" 
          :class="['nav-link', { active: isActive('/dashboard') }]"
        >
          <i class="fa-solid fa-house"></i>
          Dashboard
        </Link>
        <Link 
          href="/student-list" 
          :class="['nav-link', { active: isActive('/student-list') }]"
        >
          <i class="fa-solid fa-chart-bar"></i>
          Student Lists
        </Link>
        <Link 
          href="/add-new" 
          :class="['nav-link', { active: isActive('/add-new') }]"
        >
          <i class="fa-solid fa-plus"></i>
          Add new
        </Link>
      </div>
    </div>
    <div class="cta-button-dashboard">
      <i class="fa-solid fa-plus not-circle"></i>
      <h1 class="cta-button-dashboard-head">Add new</h1>
      <p class="cta-text">Add new student info</p>
      <button class="button-1" @click="navigateToAddNew">Click here</button>
    </div>
  </div>
</template>

<style scoped>
.sidebar {
  width: 280px;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  background-color: #fff;
  padding: 20px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
  z-index: 1000;
}

.logo-sec {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.logo {
  width: 37px;
  height: 37px;
  object-fit: contain;
}

.logo-text {
  color: #2D3748;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
  padding-left: 12px;
  margin: 0;
}

.separator {
  margin: 15px 0;
}

.separator hr {
  border: none;
  border-top: 1px solid #E2E8F0;
}

.dashboard-list {
  margin-top: 20px;
}

.not-flex {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.nav-link {
  display: flex;
  align-items: center;
  font-size: 12px;
  font-weight: 700;
  color: #A0AEC0;
  padding: 12px 20px 12px 16px;
  border-radius: 15px;
  transition: all 0.3s ease;
  text-decoration: none;
}

.nav-link i {
  font-size: 15px;
  padding: 7.5px;
  margin-right: 11.5px;
  border-radius: 12px;
  background-color: #ffffff;
  color: #235F23;
}

.nav-link.active {
  color: #2D3748;
  box-shadow: 0 3.5px 5.5px 0 rgba(0, 0, 0, 0.2);
}

.nav-link.active i {
  background-color: #235F23;
  color: #ffffff;
}

.nav-link:hover:not(.active) {
  color: #2D3748;
  background-color: #f8f9fa;
}

.cta-button-dashboard {
  padding: 16px;
  background-color: #235F23;
  border-radius: 15px;
  margin-top: 85px;
  color: white;
}

.cta-button-dashboard .fa-plus {
  font-size: 24px;
  margin-bottom: 21px;
  color: white;
}

.cta-button-dashboard-head {
  font-size: 14px;
  font-weight: 700;
  margin-bottom: 5px;
}

.cta-text {
  font-size: 12px;
  font-weight: 400;
  margin-bottom: 15px;
}

.cta-link {
  text-decoration: none;
}

.button-1 {
  width: 100%;
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  border: none;
  padding: 8px 0;
  border-radius: 12px;
  background: white;
  color: #000;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button-1:hover {
  background: #f8f9fa;
  transform: translateY(-1px);
}
</style>
  