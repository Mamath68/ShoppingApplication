import { FC, useEffect, useState } from "react";
import { Text, View } from "react-native";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { NativeStackNavigationProp } from "@react-navigation/native-stack";

import { MainBtn } from "@/components";
import { HomeStyles } from "@/theme";

// Define navigation param list (déclaré AVANT son utilisation)
type RootStackParamList = {
    HomeScreen: undefined;
    LoginScreen: undefined;
    RegisterScreen: undefined;
};

// Type for navigation prop
type HomeScreenNavigationProp = NativeStackNavigationProp<RootStackParamList, "HomeScreen">;

// Type for User object
interface User {
    name: string;
}

// Props type for HomeScreen
interface HomeScreenProps {
    navigation: HomeScreenNavigationProp;
}

export const HomeScreen: FC<HomeScreenProps> = ({ navigation }) => {
    const [user, setUser] = useState<User | null>(null);

    // Charger l'utilisateur au démarrage
    useEffect(() => {
        const loadUser = async () => {
            try {
                const userData = await AsyncStorage.getItem("user");
                if (userData) {
                    try {
                        const parsedUser = JSON.parse(userData);
                        setUser(parsedUser);
                    } catch (parseError) {
                        console.error("Erreur de parsing des données utilisateur :", parseError);
                    }
                }
            } catch (error) {
                console.error("Erreur lors du chargement de l'utilisateur :", error);
            }
        };
        loadUser();
    }, []);

    // Fonction pour se déconnecter
    const handleLogout = async () => {
        try {
            await AsyncStorage.removeItem("user");
            setUser(null);
            navigation.replace("LoginScreen"); // Remplace au lieu de naviguer pour éviter le retour arrière
        } catch (error) {
            console.error("Erreur lors de la déconnexion :", error);
        }
    };

    return (
        <View style={HomeStyles.container}>
            <View>
                {!user ? (
                    <>
                        <MainBtn name="Login" onPress={() => navigation.navigate("LoginScreen")} />
                        <MainBtn name="Sign Up Now" onPress={() => navigation.navigate("RegisterScreen")} />
                    </>
                ) : (
                    <>
                        <Text>Bienvenue sur votre compte {user.name}!</Text>
                        <MainBtn name="Logout" onPress={handleLogout} />
                    </>
                )}
            </View>
        </View>
    );
};
