import {StyleSheet} from "react-native";

export const RegisterStyles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center', // ✅ Centers all content
        justifyContent: 'center',
        backgroundColor: '#ECF0F1',
    },

    inputContainer: {
        alignItems: 'center', // ✅ Centers inputs
        marginTop: 20,
    },

    input: {
        width: 250,
        marginVertical: 10,
        borderWidth: 1,
        borderRadius: 5,
        padding: 10
    },

    columnBtn: {
        flexDirection: 'row',
        justifyContent: 'center',
        marginTop: 30,
    }
});
