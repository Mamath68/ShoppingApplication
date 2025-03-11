import {StyleSheet} from 'react-native';

export const ThemeProviderStyles = StyleSheet.create({
    /*****Light Mode*****/
    lightContainer: {
        backgroundColor: '#ECF0F1'
    },
    primaryLightThemeText: {
        fontFamily: 'Montserrat-bold',
        color: '#2D46AF',
    },
    secondaryLightThemeText: {
        fontFamily: 'Montserrat-bold',
        color: '#130F0E',
    },
    lightInput: {
        borderBottomColor: '#2D46AF',
        fontFamily: 'Montserrat',
        color: '#2D46AF',
        width: 250, // ✅ Ensure consistent width for inputs
        marginVertical: 5, // ✅ Add space between inputs
    },
    lightResetPassword: {
        borderBottomColor: '#2D46AF',
        fontFamily: 'Montserrat-bold',
        color: '#2D46AF',
        width: 250, // ✅ Ensure consistent width for inputs
        marginVertical: 5, // ✅ Add space between inputs
    },
    lightProgressBar: {
        backgroundColor: '#4caf50',
    },
    lightWhiteButton: {
        borderColor: 'blue',
        width: 150,
        backgroundColor: 'blue',
        borderWidth: 1.5
    },
    lightWhiteWideButton: {
        borderColor: 'blue',
        width: 200,
        color: "#130F0E",
        backgroundColor: 'blue',
        borderWidth: 1.5
    },
    lightWhiteButtonText: {
        color: "#ECF0F1",
        fontFamily: 'Montserrat-bold'
    },
    lightBlueButton: {
        backgroundColor: "white",
        color: "#130F0E",
        width: 150,
        borderColor: "blue",
        borderWidth: 1.5
    },
    lightBlueButtonText: {
        color: "#2D46AF",
        fontFamily: 'Montserrat-bold'
    },

    /*****Dark Mode*****/
    darkContainer: {
        backgroundColor: '#2D46AF',
    },
    primaryDarkThemeText: {
        fontFamily: 'Montserrat-bold',
        color: '#ECF0F1',
    },
    secondaryDarkThemeText: {
        fontFamily: 'Montserrat-bold',
        color: '#FFFF00',
    },
    darkInput: {
        borderBottomColor: '#ECF0F1',
        fontFamily: 'Montserrat',
        color: '#ECF0F1',
        width: 250, // ✅ Ensure consistent width for inputs
        marginVertical: 5, // ✅ Add space between inputs
    },
    darkResetPassword: {
        borderBottomColor: '#ECF0F1',
        fontFamily: 'Montserrat-bold',
        color: '#ECF0F1',
        width: 250, // ✅ Ensure consistent width for inputs
        marginVertical: 5, // ✅ Add space between inputs
    },
    darkProgressBar: {
        backgroundColor: '#FFFF00',
    },
    darkWhiteButton: {
        borderColor: 'white',
        width: 150,
        borderWidth: 1.5,
        backgroundColor: 'white'
    },
    darkWhiteWideButton: {
        borderColor: 'white',
        width: 200,
        borderWidth: 1.5,
        backgroundColor: 'white'
    },
    darkWhiteButtonText: {
        color: "#2D46AF",
        fontFamily: 'Montserrat-bold'
    },
    darkBlueButton: {
        backgroundColor: 'none',
        borderColor: 'white',
        width: 150,
        borderWidth: 1.5
    },
    darkBlueButtonText: {
        color: "#ECF0F1",
        fontFamily: 'Montserrat-bold'
    },
});
