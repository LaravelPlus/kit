import api from "@/Boot/axios";
import { User } from "@/types";
import { ApiResponse } from "@/types/api";

// example of an api call using axios wrapper
// use generic types: ApiResponse<type> and
// PaginatedApiResponse<type> to get type
// safety for your response data here.
// we are expecting data of type User
// defined in types/models.ts
export async function getUser() {
    return api<ApiResponse<User>>({
        method: 'get',
        url: 'user',
        onSuccess: (data) => {
            console.log(data.data.email)
        },
        onCatch: (e) => {
            console.log(e);
        },
        onFinally: () => {
            console.log('done');
        }
    });
}
