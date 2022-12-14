import EventEmitter from 'events';
import appApi from "~/api/index";
import store from "~/admin/store";
import errorHandlerService from '~/admin/services/errorHandlerService';
import {useToast} from "vue-toastification";
import {ApiResponse, LocalStorageKeys} from "~/constants";
import router from "~/admin/router";
import localStorageService from "~/services/localStorageService";

const toast = useToast();

class AuthService extends EventEmitter {
    // async handleRegistration(newUser) {
    //     try {
    //         const response = await appApi.post('/register', newUser);
    //         if (response.data.status === ApiResponse.SUCCESS) {
    //             toast.success("Registration Completed!");
    //             await store.dispatch('actionAuthState', response.data.payload);
    //             router.push({name: `user-dashboard`});
    //         } else {
    //             toast.error(response.data.message);
    //         }
    //     } catch (err) {
    //         console.log(err, "catch error");
    //         const error = await errorHandlerService.errors.index(err);
    //         toast.error(error.message);
    //     }
    // }

    async handleLogin(email, password, rememberMe) {
        let credentials = {email, password};
        try {
            const response = await appApi.post('/login', credentials);
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAuthState', response.data.payload);
                console.log(response.data.payload,"HELLO WORLd");
                router.push({name: 'dashboard'});
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }

    }

    isAuthenticated() {
        const accessToken = store.getters.getAccessToken;
        if (!accessToken) {
            return false;
        }
        return true;
    }
    verifyRoleIdsAccess(userRoleIds) {
        const roles = store.getters['getRoleIds'];
        return roles.some(v => userRoleIds.indexOf(v) >= 0);
    }
    user() {
        return store.getters['getProfile'];
    }
    async handleLogout() {
        try {
            const response = await appApi.post('/logout');
            if (response.data.status === ApiResponse.SUCCESS) {
                await this.onLogout();
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async onLogout(accessDenied = false) {
        await store.dispatch('actionClearAuthState');
        (accessDenied) ? toast.error('Access Denied') : '' ;
        router.push({name: `login`});
    }

    async handleSendVerificationCode(payload) {
        try {
            const response = await appApi.post('/send/code', payload);
            if (response.data.status === ApiResponse.SUCCESS) {
                if (payload.email) {
                    await localStorageService.setWithExpiry({
                        key: LocalStorageKeys.USER_EMAIL,
                        value: payload.email,
                        ttl: LocalStorageKeys.TTL
                    });
                }
                toast.success(response.data.message);
                router.push({
                    name: 'reset-password',
                    params: {encodedToken: response.data.payload.token}
                });
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async handleUpdatePassword(data) {
        try {
            const response = await appApi.post('/reset/password', data);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message, {
                    timeout: 3500
                });
                await router.push({
                    path: '/login'
                });
            } else {
                toast.error(response.data.message, {
                    timeout: 3500
                });
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new AuthService();
export default service;
