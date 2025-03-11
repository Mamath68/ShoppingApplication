import React, {FC, useState} from "react";
import {Button, Text, TextInput, View} from "react-native";
import AsyncStorage from "@react-native-async-storage/async-storage";
import {LoginStyles, RegisterStyles} from "@/theme";

interface LoginProps {
    navigation: {
        navigate: (screen: string) => void;
    };
}

export const LoginScreen: FC<LoginProps> = ({navigation}) => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [message, setMessage] = useState("");

    const handleLogin = async () => {
        try {
            const response = await fetch("http://192.168.1.26:8080/login", {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({email, password}),
            });

            const data = await response.json();
            console.log(data.message)
            if (data.success) {
                setMessage("Connexion réussie !");
                await AsyncStorage.setItem("userToken", JSON.stringify(data.user));
            } else {
                setMessage(data.message);
            console.log(data.message)
            }
        } catch (error) {
            setMessage("Erreur de connexion");
        }
    };

    return (
        <View style={LoginStyles.container}>
            <TextInput placeholder="Email" value={email} onChangeText={setEmail}
                       style={LoginStyles.input}/>
            <TextInput placeholder="Mot de passe" value={password} onChangeText={setPassword} secureTextEntry
                       style={LoginStyles.input}/>
            <Button title="Se connecter" onPress={handleLogin}/>
            {message ? <Text style={{marginTop: 10}}>{message}</Text> : null}
        </View>
    );
};
