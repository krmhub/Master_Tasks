import api from "./axios";

/**
 * Get all tasks for the authenticated user
 */
export const getTasks = async () => {
    const response = await api.get("/tasks");
    return response.data;
};

/**
 * Get a single task by ID
 */
export const getTask = async (id) => {
    const response = await api.get(`/tasks/${id}`);
    return response.data;
};

/**
 * Create a new task
 */
export const createTask = async (taskData) => {
    const response = await api.post("/tasks", taskData);
    return response.data;
};

/**
 * Update an existing task
 */
export const updateTask = async (id, taskData) => {
    const response = await api.put(`/tasks/${id}`, taskData);
    return response.data;
};

/**
 * Delete a task
 */
export const deleteTask = async (id) => {
    const response = await api.delete(`/tasks/${id}`);
    return response.data;
};

/**
 * Search tasks using filters
 */
export const searchTasks = async (filters = {}) => {
    const response = await api.get("/tasks/search", {
        params: filters,
    });

    return response.data;
};