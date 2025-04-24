import React, { useEffect, useState } from "react";
import axios from "axios";

const ClientList = () => {
    const [clients, setClients] = useState([]);

    useEffect(() => {
        axios.get("http://localhost/api.php").then(response => setClients(response.data))
        .catch(error => console.error("Error fetching data:", error));
    }, []);

    const handleDelete = (id) => {
        axios.delete(`http://localhost/api.php?id=${id}`)
            .then(() => setClients(clients.filter(client => client.id !== id)))
            .catch(error => console.error("Error deleting client:", error));
    };

    return (
        <div>
            <h2>Client List</h2>

            <ul>
                {clients.map(client => (
                    <li key={client.id}>
                        {client.name} - {client.slug}
                        <button onClick={() => handleDelete(client.id)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default ClientList;