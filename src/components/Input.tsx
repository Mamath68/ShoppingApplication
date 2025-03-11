import {KeyboardTypeOptions, StyleProp, TextInput, TextInputProps, TextStyle, View, ViewStyle} from "react-native";
import {InputStyles} from "@/theme";
import {FC} from "react";

interface InputProps extends Omit<TextInputProps, "style"> {
    placeholder: string;
    value: string;
    inputMode?: TextInputProps["inputMode"];
    onChangeText: (text: string) => void;
    style?: StyleProp<ViewStyle>;
    inputStyle?: StyleProp<TextStyle>;
    secureTextEntry?: boolean;
    keyboardType?: KeyboardTypeOptions;
}

export const Input: FC<InputProps> = ({
                                          placeholder,
                                          value,
                                          inputMode,
                                          onChangeText,
                                          style,
                                          inputStyle,
                                          secureTextEntry,
                                          keyboardType,
                                          ...restProps
                                      }) => {

    return (
        <View style={style}>
            <TextInput
                style={[InputStyles.input, inputStyle]}
                inputMode={inputMode}
                placeholder={placeholder}
                value={value}
                onChangeText={onChangeText}
                secureTextEntry={secureTextEntry}
                keyboardType={keyboardType}
                {...restProps}
            />
        </View>
    );
};
