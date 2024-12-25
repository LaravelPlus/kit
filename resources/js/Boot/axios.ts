
import type { ApiCallOptions, ApiError, ApiResponse } from "@/types/api";
import Axios from 'axios'

import {
    AxiosError,
    AxiosInstance,
    InternalAxiosRequestConfig,
    AxiosResponse,
} from "axios";

const axios: AxiosInstance = Axios.create({
    baseURL: 'api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    withCredentials: true,
    withXSRFToken: true,
})


// request interceptor
axios.interceptors.request.use(

    // success
    (config: InternalAxiosRequestConfig): InternalAxiosRequestConfig => {
        return config;
    },

    // failure
    (error: AxiosError): Promise<AxiosError> => {
        return Promise.reject(error);
    });

// response interceptor
axios.interceptors.response.use(

    // success
    (response: AxiosResponse): AxiosResponse => {
        return response
    },


    // failure
    async (error: AxiosError): Promise<AxiosError> => {
        console.error(error)

        //enable if you want blocking axios errors (show error page)
        // router.visit('/error', {
        //     method:'post',
        //     data: {
        //         status: error.status
        //     },
        // });

        return Promise.reject(error)
    }
);


/**
 * Axios wrapper
 */
async function api<T>(
    options: ApiCallOptions<T>
): Promise<ApiResponse<T> | ApiError> {
    const { method, url, params, data, withLoading = false, onCatch, onSuccess, onFinally } = options;

    try {
        const response = await axios({ method, url, params, data });
        if (onSuccess) onSuccess(response.data, response.status)
        return { data: response.data, status: response.status, error: undefined };

    } catch (e: any) {
        // interceptor already logging
        if (onCatch) onCatch(e)
        return { status: e.response?.status, error: e, data: undefined };

    } finally {
        if (onFinally) onFinally()
    }
}

export default api;
