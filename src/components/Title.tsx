import React from 'react';
import { Text, StyleProp, TextStyle, ViewStyle } from 'react-native';
import { TitleStyle } from '@/theme';

interface TitleProps {
    style?: StyleProp<ViewStyle>;
    level?: 1 | 2 | 3 | 4 | 5 | 6;
    textStyle?: StyleProp<TextStyle>;
    name: string;
}

export const Title: React.FC<TitleProps> = ({ style, level = 1, textStyle, name }) => {
    const fontSizes: { [key: number]: number } = {
        1: 32,  // h1
        2: 28,  // h2
        3: 24,  // h3
        4: 20,  // h4
        5: 18,  // h5
        6: 16   // h6
    };

    return (
        <Text style={[TitleStyle.txt, { fontSize: fontSizes[level] || 32 }, textStyle, style]}>
            {name}
        </Text>
    );
};
