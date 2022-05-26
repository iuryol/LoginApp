import { Inertia } from "@inertiajs/inertia";
import React, { useState } from "react";
export default (props) => {
    const [user, setUser] = useState('');
    const [password, setPass] = useState('');

        function handlerUser(e){
            setUser(e.target.value)
        }

        function handlerPass(e){
            setPass(e.target.value)
        }

        function handlerLogin(){
            const data = {user:user,password:password};
            
         Inertia.post('/auth',data);
        }


    return(
        <div className="flex flex-col bg-gray-200" id="main">
            <div className="flex flex-col h-screen items-center justify-center border-2 border-black">
            <h1 className="text-lg mb-4">Login:</h1>
            
            <div className=" flex flex-col items-center shadow-lg rounded-sm bg-[#81254c] w-[250px]">
                <h1 className="text-lg text-white">usuário</h1>
                <input onChange={handlerUser} className="border-2 border-gray" type="email" />
                <h1 className="text-lg text-white">senha</h1>
                <input onChange={handlerPass} className="border-2 border-gray" type="password" />
                <button onClick={handlerLogin} className="bg-[#FBB5DF] m-2 p-2 rounded-md hover:bg-red-100">Acessar</button>
            </div>
            </div>
        </div>
    )
}