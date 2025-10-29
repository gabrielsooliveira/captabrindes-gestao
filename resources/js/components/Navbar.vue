<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";

const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    isMenuOpen.value = false;
};

// Fecha se clicar fora do painel no mobile
const handleClickOutside = (event) => {
    const modalMenu = document.querySelector(".mobile-menu");
    const toggler = document.querySelector(".navbar-toggler");

    if (
        isMenuOpen.value &&
        modalMenu &&
        !modalMenu.contains(event.target) &&
        !toggler.contains(event.target)
    ) {
        closeMenu();
    }
};

onMounted(() => {
    document.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener("click", handleClickOutside);
});
</script>

<template>
    <nav
        class="navbar navbar-expand-lg navbar-light bg-light shadow-sm custom-navbar"
    >
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="#">
                CaptaBrindes
            </a>

            <!-- Botão toggle -->
            <button
                class="btn d-lg-none border-0"
                type="button"
                @click="toggleMenu"
            >
                <font-awesome-icon icon="fas fa-bars" size="lg" />
            </button>

            <!-- Navbar padrão para desktop -->
            <div
                class="collapse navbar-collapse d-none d-lg-block flex-wrap align-items-center justify-content-between"
            >
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Propostas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">WebSite</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <div class="dropdown ms-auto">
                        <a
                            class="nav-link dropdown-toggle d-flex align-items-center"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img
                                src="https://dummyimage.com/600x400/000/fff"
                                class="rounded-circle me-2"
                                alt="User Avatar"
                                width="32"
                                height="32"
                            />
                            <span>Gabriel</span>
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end shadow mt-3"
                            aria-labelledby="userDropdown"
                        >
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @click="closeMenu"
                                    >Perfil</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @click="closeMenu"
                                    >Configurações</a
                                >
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <a
                                    class="dropdown-item text-danger"
                                    href="#"
                                    @click="closeMenu"
                                    >Sair</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal responsivo -->
    <transition name="fade">
        <div
            v-if="isMenuOpen"
            class="position-fixed top-0 start-0 w-100 h-100 bg-light d-flex flex-column p-4 z-3 overflow-y-auto"
        >
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-primary mb-0">CaptaBrindes</h5>
                <button class="btn btn-link text-dark fs-4" @click="closeMenu">
                    <font-awesome-icon icon="fas fa-xmark" />
                </button>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#" @click="closeMenu">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" @click="closeMenu">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" @click="closeMenu">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" @click="closeMenu">Contato</a>
                </li>
                <li><hr /></li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="dropdown ms-auto">
                    <a
                        class="nav-link dropdown-toggle d-flex align-items-center"
                        href="#"
                        id="userDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="https://dummyimage.com/600x400/000/fff"
                            class="rounded-circle me-2"
                            alt="User Avatar"
                            width="32"
                            height="32"
                        />
                        <span>Gabriel</span>
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end shadow"
                        aria-labelledby="userDropdown"
                    >
                        <li>
                            <a class="dropdown-item" href="#" @click="closeMenu"
                                >Perfil</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" @click="closeMenu"
                                >Configurações</a
                            >
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a
                                class="dropdown-item text-danger"
                                href="#"
                                @click="closeMenu"
                                >Sair</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped lang="scss">
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease, transform 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}

@keyframes slideDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@media (min-width: 992px) {
    .mobile-menu {
        display: none !important;
    }
}
</style>
