import { defineStore } from "pinia";

export const useUserStore = defineStore('userStore', {
    state: () => ({
        user: null,
        isAuthenticated: false,
    }),
    getters: {
        getUser(state){
            return state.user;
        },
        isAuthenticated(state){
            return state.isAuthenticated;
        }
    },
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