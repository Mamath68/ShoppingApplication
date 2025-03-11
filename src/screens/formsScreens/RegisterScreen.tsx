import {FC, useState} from "react";
import {Button, Text, TextInput, View, ActivityIndicator} from "react-native";
import {RegisterStyles} from "@/theme";

interface RegisterProps {
    navigation: {
        navigate: (screen: string) => void;
    };
}

export const RegisterScreen: FC<RegisterProps> = ({navigation}) => {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [message, setMessage] = useState("");
    const [loading, setLoading] = useState(false);

    const isValidEmail = (email: string) => /\S+@\S+\.\S+/.test(email);

    const handleRegister = async () => {
        if (!name || !email || !password) {
            setMessage("Tous les champs sont requis.");
            return;
        }
        if (!isValidEmail(email)) {
            setMessage("Email invalide.");
            return;
        }

        setLoading(true);
        setMessage("");

        try {
            const response = await fetch("http://192.168.1.26:8080/register", {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({name, email, password}),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                setMessage("Inscription réussie !");
                setTimeout(() => navigation.navigate("LoginScreen"), 1500);
            } else {
                setMessage(data.message || "Erreur lors de l'inscription.");
            }
        } catch (error) {
            setMessage("Erreur réseau, veuillez réessayer.");
        } finally {
            setLoading(false);
        }
    };

    return (
        <View style={RegisterStyles.container}>
            <TextInput
                placeholder="Nom"
                value={name}
                onChangeText={setName}
                style={RegisterStyles.input}
            />
            <TextInput
                placeholder="Email"
                value={email}
                onChangeText={setEmail}
                keyboardType="email-address"
                autoCapitalize="none"
                style={RegisterStyles.input}
            />
            <TextInput
                placeholder="Mot de passe"
                value={password}
                onChangeText={setPassword}
                secureTextEntry
                style={RegisterStyles.input}
            />
            <Button title="S'inscrire" onPress={handleRegister} disabled={loading} />
            {loading && <ActivityIndicator size="small" color="#0000ff" />}
            {message ? <Text style={{marginTop: 10, color: "red"}}>{message}</Text> : null}
        </View>
    );
};
