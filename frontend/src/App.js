import React, { useState } from 'react';
import ClientList from './ClientList';
import ClientForm from './ClientForm';

function App() {
  const [clients, setClients] = useState([]);

  const handleClientAdded = (newClient) => {
    setClients([...clients, { ...newClient, id: Date.now() }]);
  };

  return (
    <div>
        <h1>Client Management</h1>
        <ClientForm onClientAdded={handleClientAdded} />
        <ClientList clients={clients} setClients={setClients} />
    </div>
  );
}

export default App;
