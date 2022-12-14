import EventEmitter from "events";
import {ApiResponse} from "~/constants";
import appApi from "~/api";
import errorHandlerService from "~/admin/services/errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/admin/router";
const toast = useToast();
import store from "../store";
import agencyService from "./agencyService";

class UserService extends EventEmitter {
    async getAgencyUsersList() {
        try {
            const response = await appApi.get('/user/list');
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await store.dispatch('setUsers', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }


    async getAllRoles() {
        try {
            const response = await appApi.get('/roles');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionRoles', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async handleAddAgencyUser(agencyUserData) {
        try {
            const response = await appApi.post('/user/add',agencyUserData);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await agencyService.getAgencyList();
                router.push({path: '/admin/'+agencyUserData.agency_id+'/users/'});
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async getAgencyUserById(userId){
        try {
            const response = await appApi.get('/user/edit/'+userId);
                toast.success(response.data.message);
                return response.data.payload;
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleUpdateAgencyUser(userData,userId) {
        try {
            const response = await appApi.put('/user/'+userId,userData);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await agencyService.getAgencyList();
                router.push({path: '/admin/'+response.data.payload.agencies[0].id+'/users/'});
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async deleteUser(userId){
        try {
            const response = await appApi.delete('/user/'+userId);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await agencyService.getAgencyList();
                return response.data;
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getUserMenu(path) {
        try {
            const response = await appApi.get('/user/menu?route='+path);
            await store.dispatch('actionUserMenu', response.data.payload);
        } catch (err) {
            console.log(err, "err err");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleUserChat(data){
        try {
            console.log(data,"Asdsadas");
            const response = await appApi.post('/user/chat/send/message',data);
            toast.success(response.data.message);
            // await store.dispatch('actionUserMenu', response.data.payload);
        } catch (err) {
            console.log(err, "err err");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new UserService();
export default service;
