// here we define types and interfaces
// of our laravel models / ApiResources / DTOs

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}
