import api from "./axios";

/**
 * Register a new user
 */
export const register = async (userData) => {
    const response = await api.post("/register", userData);
    return response.data;
};

/**
 * Login user
 */
export const login = async (credentials) => {
    const response = await api.post("/login", credentials);
    return response.data;
};

/**
 * Logout authenticated user
 */
export const logout = async () => {
    const response = await api.post("/logout");
    return response.data;
};