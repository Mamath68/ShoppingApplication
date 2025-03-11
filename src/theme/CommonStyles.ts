import {StyleSheet} from 'react-native';

export const CommonStyles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#ECF0F1',
        alignItems: 'center',
        justifyContent: 'space-between',
    },

    // Login screen
    txtInput: {
        borderBottomWidth: 1,
        borderBottomColor: "#ECF0F1",
        marginLeft: 80,
        marginRight: 80,
        alignSelf: 'flex-start',
        width: 250,
    },

    // Header
    header: {
        width: 300,
        height: 150,
        alignItems: 'center',
        justifyContent: 'center',
    },

    // Footer
    footer: {
        alignSelf: 'flex-start',
    },

    footerImg: {
        height: 75,
        width: 150,
    },

    // Text
    txt: {
        textAlign: 'center',
        marginTop: 30
    },
});
