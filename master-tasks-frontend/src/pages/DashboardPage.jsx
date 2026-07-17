import { useAuth } from "../context/AuthContext";

function DashboardPage() {
    const { isAuthenticated } = useAuth();

    return (
        <>
            <h1>Dashboard</h1>

            <h2>
                {isAuthenticated ? "Authenticated" : "Guest"}
            </h2>
        </>
    );
}

export default DashboardPage;