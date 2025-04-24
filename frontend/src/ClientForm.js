import React, { useState } from "react";
import axios from "axios";

const ClientForm = ({ onClientAdded }) => {
    const [formData, setFormData] = useState({
        name: "",
        slug: "",
        is_project: "",
        self_capture: "",
        client_prefix: "",
        client_logo: null,
        address: "",
        phone_number: "",
        city: ""
    });

    const handleSubmit = (event) => {
        event.preventDefault();
        axios.post("http://localhost/api.php", formData)
            .then(response => {
                onClientAdded(formData);
                setFormData({
                    name: "",
                    slug: "",
                    is_project: "0",
                    self_capture: "1",
                    client_prefix: "",
                    client_logo: null,
                    address: "",
                    phone_number: "",
                    city: ""
                });
            })
            .catch(error => console.error("Error adding client:", error));
    };

    return (
        <form onSubmit={handleSubmit}>
            <h2>Add Client</h2>
            <div>
                <label>Name:</label>
                <input
                    type="text"
                    value={formData.name}
                    onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                    required
                />
            </div>
            <div>
                <label>Slug:</label>
                <input
                    type="text"
                    value={formData.slug}
                    onChange={(e) => setFormData({ ...formData, slug: e.target.value })}
                    required
                />
            </div>
            <div>
                <label>Is Project:</label>
                <select
                    value={formData.is_project}
                    onChange={(e) => setFormData({ ...formData, is_project: e.target.value })}
                >
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div>
                <label>Self Capture:</label>
                <select
                    value={formData.self_capture}
                    onChange={(e) => setFormData({ ...formData, self_capture: e.target.value })}
                >
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div>
                <label>Client Prefix:</label>
                <input
                    type="text"
                    value={formData.client_prefix}
                    onChange={(e) => setFormData({ ...formData, client_prefix: e.target.value })}
                />
            </div>
            <div>
                <label>Client Logo:</label>
                <input
                    type="file"
                    accept="image/*"
                    onChange={(e) => setFormData({ ...formData, client_logo: e.target.files[0] })}
                />
            </div>
            <div>
                <label>Address:</label>
                <input
                    type="text"
                    value={formData.address}
                    onChange={(e) => setFormData({ ...formData, address: e.target.value })}
                />
            </div>
            <div>
                <label>Phone Number:</label>
                <input
                    type="text"
                    value={formData.phone_number}
                    onChange={(e) => setFormData({ ...formData, phone_number: e.target.value })}
                />
            </div>
            <div>
                <label>City:</label>
                <input
                    type="text"
                    value={formData.city}
                    onChange={(e) => setFormData({ ...formData, city: e.target.value })}
                />
            </div>
            <button type="submit">Add Client</button>
        </form>
    );
};

export default ClientForm;