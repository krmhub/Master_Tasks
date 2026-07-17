import { createContext, useContext, useEffect, useState } from "react";
import * as authService from "../api/authService";

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
    const [user, setUser] = useState(null);
    const [token, setToken] = useState(localStorage.getItem("token"));
    const [loading, setLoading] = useState(true);

    const isAuthenticated = !!token;

    useEffect(() => {
        setLoading(false);
    }, []);

    const login = async (credentials) => {
        const data = await authService.login(credentials);

        localStorage.setItem("token", data.token);

        setToken(data.token);
        setUser(data.user);

        return data;
    };

    const register = async (userData) => {
        const data = await authService.register(userData);

        localStorage.setItem("token", data.token);

        setToken(data.token);
        setUser(data.user);

        return data;
    };

    const logout = async () => {
        try {
            await authService.logout();
        } catch (error) {
            console.error(error);
        }

        localStorage.removeItem("token");

        setToken(null);
        setUser(null);
    };

    return (
        <AuthContext.Provider
            value={{
                user,
                token,
                loading,
                isAuthenticated,
                login,
                register,
                logout,
            }}
        >
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = () => useContext(AuthContext);