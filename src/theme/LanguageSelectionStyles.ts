import {StyleSheet} from 'react-native';

export const LanguageSelectionStyles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'space-between',
        alignItems: 'center',
        backgroundColor: '#fff',
    },
    title: {
        fontSize: 24,
        marginVertical: 50,
    },
    image: {
        width: 100,
        height: 60,
        marginVertical: 40,
    },
    alignCenter: {
        flexDirection: 'row',
        gap: 20,
        alignItems: 'center'
    },
});
