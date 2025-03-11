import {StyleSheet} from 'react-native';

export const HomeStyles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#ECF0F1',
    },

    title: {
        fontSize: 24,
        marginBottom: 20,
    },

    iconsSpace: {
        flexDirection: 'row',
        justifyContent: 'space-around',
        width: '100%',
    }
});
