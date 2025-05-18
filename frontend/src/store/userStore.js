import { defineStore } from "pinia";

export const useUserStore = defineStore('userStore', {
    state: () => ({
        user: null,
        isAuthenticated: false,
    }),
    actions: {
        setUser(user){
            this.user = user;
            this.isAuthenticated = true;
        },
        clearUser(){
            this.user = null;
            this.isAuthenticated = false;
        }
    }
});